<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\InputRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    private const DEFAULT_BASE_VALUE = 'Tidak diisi';

    /**
     * ===============================
     * HALAMAN AWAL
     * ===============================
     */
    public function index()
    {
        $riwayatList = $this->getRiwayatList();
        $riwayat = $riwayatList->first();

        return view('rekomendasi.index', [
            'riwayat' => $riwayat,
            'riwayatList' => $riwayatList,
            'hasil'   => null,
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
        ]);

        // ================= SIMPAN INPUT USER =================
        InputRekomendasi::create([
            'id_user' => Auth::id(),
            'kategori' => $data['kategori'],
            'sub_kategori' => $data['sub_kategori'],
            'base' => self::DEFAULT_BASE_VALUE,
            'lokasi_penggunaan' => implode(',', $data['lokasi_penggunaan']),
        ]);

        $riwayatList = $this->getRiwayatList();
        $riwayat = $riwayatList->first();

        // ================= BOBOT ATRIBUT (SESUI PAPER) =================
        $bobot = [
            'kategori' => 0.40,
            'sub_kategori' => 0.30,
            'lokasi' => 0.30,
        ];

        // ================= CONTENT-BASED SIMILARITY =================
        $hasil = [];
        $produkList = Produk::with('kategori')->get();

        foreach ($produkList as $produk) {
            $similarity = 0;
            $kategoriProduk = $produk->kategori->nama ?? null;
            $subKategoriProduk = $this->normalizeSetValues($produk->sub_kategori);
            $lokasiProduk = $this->normalizeSetValues($produk->lokasi_penggunaan);

            // --- KATEGORI ---
            if ($kategoriProduk === $data['kategori']) {
                $similarity += $bobot['kategori'];
            }

            // --- SUB KATEGORI (DICE SIMILARITY) ---
            $subKategoriScore = $this->diceSimilarity(
                [$data['sub_kategori']],
                $subKategoriProduk
            );
            $similarity += $subKategoriScore * $bobot['sub_kategori'];

            // --- LOKASI (DICE SIMILARITY) ---
            $lokasiScore = $this->diceSimilarity(
                $data['lokasi_penggunaan'],
                $lokasiProduk
            );
            $similarity += $lokasiScore * $bobot['lokasi'];

            // --- KONVERSI KE PERSENTASE ---
            $persen = round($similarity * 100, 2);

            // --- THRESHOLD ---
            if ($persen >= 40) {
                $hasil[] = [
                    'produk' => $produk,
                    'score' => $persen,
                    'kategori_score' => round(($kategoriProduk === $data['kategori'] ? 1 : 0) * 100, 2),
                    'sub_kategori_score' => round($subKategoriScore * 100, 2),
                    'lokasi_score' => round($lokasiScore * 100, 2),
                ];
            }
        }

        // ================= SORTING =================
        usort($hasil, fn ($a, $b) => $b['score'] <=> $a['score']);
        $hasil = array_values(array_map(function ($item, $index) {
            $item['ranking'] = $index + 1;
            return $item;
        }, $hasil, array_keys($hasil)));

        return view('rekomendasi.index', [
            'hasil' => $hasil,
            'riwayat' => $riwayat,
            'riwayatList' => $riwayatList,
            ...$this->getFormOptions(),
        ]);
    }

    private function getRiwayatList()
    {
        return InputRekomendasi::where('id_user', Auth::id())
            ->orderByDesc('created_at')
            ->limit(5)
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

        return [
            'kategoriOptions' => $kategoriOptions,
            'subKategoriOptions' => $subKategoriOptions,
            'lokasiOptions' => $lokasiOptions,
        ];
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

    private function diceSimilarity(array $userValues, array $productValues): float
    {
        $userSet = collect($userValues)
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();

        $productSet = collect($productValues)
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();

        $totalItem = count($userSet) + count($productSet);

        if ($totalItem === 0) {
            return 0;
        }

        $intersection = count(array_intersect($userSet, $productSet));

        return (2 * $intersection) / $totalItem;
    }
}
