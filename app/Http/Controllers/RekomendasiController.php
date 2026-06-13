<?php

namespace App\Http\Controllers;

use App\Models\InputRekomendasi;
use App\Models\Kategori;
use App\Models\Kebutuhan;
use App\Models\LokasiPenggunaan;
use App\Models\Produk;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    private const THRESHOLD = 0.5;

    public function index()
    {
        return view('rekomendasi.index', [
            'riwayat' => null,
            'riwayatList' => collect(),
            'hasil' => null,
            'hasSubmitted' => false,
            'threshold' => self::THRESHOLD,
            ...$this->getFormOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'lokasi_penggunaan' => 'required|array|min:1',
            'kelebihan' => 'required|array|min:1',
        ]);

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
            ->paginate(10);

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
        return [
            'kategoriOptions' => Kategori::orderBy('nama')->pluck('nama')->values()->all(),
            'subKategoriOptions' => SubKategori::orderBy('nama')->pluck('nama')->values()->all(),
            'lokasiOptions' => LokasiPenggunaan::orderBy('nama')->pluck('nama')->values()->all(),
            'kelebihanOptions' => Kebutuhan::orderBy('nama')->pluck('nama')->values()->all(),
        ];
    }

    private function calculateRecommendations(array $data): array
    {
        $hasil = [];
        $produkList = Produk::with([
            'kategori',
            'subKategori',
            'lokasiPenggunaan',
            'kebutuhan',
        ])->get();
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
            ->map(fn ($item) => trim((string) $item))
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
            ...$produk->sub_kategori_labels,
            ...$produk->lokasi_penggunaan_labels,
            ...$produk->kebutuhan_labels,
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
