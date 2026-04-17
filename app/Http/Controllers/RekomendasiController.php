<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\InputRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    private const THRESHOLD = 0.5;

    /**
     * ===============================
     * HALAMAN AWAL
     * ===============================
     */
    public function index()
    {
        return view('rekomendasi.index', [
            'riwayat' => null,
            'riwayatList' => collect(),
            'hasil'   => null,
            'hasSubmitted' => false,
            'threshold' => self::THRESHOLD,
            ...$this->getFormOptions(),
        ]);
    }

    /**
     * ===============================
     * PROSES REKOMENDASI (CBF ATTRIBUTE-BASED)
     * ===============================
     */
    public function store(Request $request)
    {
        // ================= VALIDASI =================
        $data = $request->validate([
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'lokasi_penggunaan' => 'required|array|min:1',
            'kelebihan' => 'required|array|min:1',
        ]);

        // ================= SIMPAN INPUT USER =================
        InputRekomendasi::create([
            'id_user' => Auth::id(),
            'kategori' => $data['kategori'],
            'sub_kategori' => $data['sub_kategori'],
            'kelebihan' => implode(',', $data['kelebihan']),
            'lokasi_penggunaan' => implode(',', $data['lokasi_penggunaan']),
        ]);

        $riwayatList = $this->getRiwayatList();
        $riwayat = $riwayatList->first();

        $hasil = $this->calculateRecommendations($data);

        return view('rekomendasi.index', [
            'hasil' => $hasil,
            'riwayat' => $riwayat,
            'riwayatList' => $riwayatList,
            'hasSubmitted' => true,
            'threshold' => self::THRESHOLD,
            ...$this->getFormOptions(),
        ]);
    }

    public function history()
    {
        $riwayatList = InputRekomendasi::where('id_user', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('rekomendasi.history', compact('riwayatList'));
    }

    public function historyShow($id)
    {
        $riwayat = InputRekomendasi::where('id_user', Auth::id())
            ->where('id_input', $id)
            ->firstOrFail();

        $data = [
            'kategori' => $riwayat->kategori,
            'sub_kategori' => $riwayat->sub_kategori,
            'lokasi_penggunaan' => $this->normalizeSetValues($riwayat->lokasi_penggunaan),
            'kelebihan' => $this->normalizeSetValues($riwayat->kelebihan),
        ];

        $hasil = $this->calculateRecommendations($data);
        $threshold = self::THRESHOLD;

        return view('rekomendasi.history-show', compact('riwayat', 'hasil', 'threshold'));
    }

    private function getRiwayatList()
    {
        return InputRekomendasi::where('id_user', Auth::id())
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
    }

    private function getFormOptions(): array
    {
        $kategoriOptions = Kategori::orderBy('nama')
            ->pluck('nama')
            ->values()
            ->all();

        $subKategoriOptions = Produk::query()
            ->whereNotNull('sub_kategori')
            ->pluck('sub_kategori')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        $lokasiOptions = Produk::query()
            ->whereNotNull('lokasi_penggunaan')
            ->pluck('lokasi_penggunaan')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        $kelebihanOptions = Produk::query()
            ->whereNotNull('kelebihan')
            ->pluck('kelebihan')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        return [
            'kategoriOptions' => $kategoriOptions,
            'subKategoriOptions' => $subKategoriOptions,
            'lokasiOptions' => $lokasiOptions,
            'kelebihanOptions' => $kelebihanOptions,
        ];
    }

    private function calculateRecommendations(array $data): array
    {
        $hasil = [];
        $produkList = Produk::with('kategori')->get();
        $userKeywords = $this->buildUserKeywords($data);

        foreach ($produkList as $produk) {
            $productKeywords = $this->buildProductKeywords($produk);
            $comparison = $this->compareKeywords($userKeywords, $productKeywords);
            $score = round($comparison['score'], 4);

            if ($score >= self::THRESHOLD) {
                $hasil[] = [
                    'produk' => $produk,
                    'score' => $score,
                    'n' => $comparison['n'],
                    'bi' => $comparison['bi'],
                    'bj' => $comparison['bj'],
                    'matched_keywords' => $comparison['matched_keywords'],
                ];
            }
        }

        usort($hasil, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_values(array_map(function ($item, $index) {
            $item['ranking'] = $index + 1;
            return $item;
        }, $hasil, array_keys($hasil)));
    }

    private function normalizeSetValues(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return collect(explode(',', $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }

    private function buildUserKeywords(array $data): array
    {
        return collect([
            $data['kategori'],
            $data['sub_kategori'],
            ...$data['lokasi_penggunaan'],
            ...$data['kelebihan'],
        ])
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function buildProductKeywords(Produk $produk): array
    {
        return collect([
            $produk->kategori->nama ?? null,
            ...$this->normalizeSetValues($produk->sub_kategori),
            ...$this->normalizeSetValues($produk->lokasi_penggunaan),
            ...$this->normalizeSetValues($produk->kelebihan),
        ])
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function compareKeywords(array $userKeywords, array $productKeywords): array
    {
        $matchedKeywords = array_values(array_intersect($userKeywords, $productKeywords));
        $bi = count($userKeywords);
        $bj = count($productKeywords);
        $totalItem = $bi + $bj;

        if ($totalItem === 0) {
            return [
                'score' => 0,
                'n' => 0,
                'bi' => 0,
                'bj' => 0,
                'matched_keywords' => [],
            ];
        }

        $n = count($matchedKeywords);

        return [
            'score' => (2 * $n) / $totalItem,
            'n' => $n,
            'bi' => $bi,
            'bj' => $bj,
            'matched_keywords' => $matchedKeywords,
        ];
    }
}
