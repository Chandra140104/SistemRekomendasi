<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\InputRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    /**
     * ===============================
     * HALAMAN AWAL
     * ===============================
     */
    public function index()
    {
        $riwayat = InputRekomendasi::where('id_user', Auth::id())
            ->orderByDesc('created_at')
            ->first();

        return view('rekomendasi.index', [
            'riwayat' => $riwayat,
            'hasil'   => null
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
            'base' => 'required',
            'lokasi_penggunaan' => 'required|array|min:1'
        ]);

        // ================= SIMPAN INPUT USER =================
        InputRekomendasi::create([
            'id_user' => Auth::id(),
            'kategori' => $data['kategori'],
            'sub_kategori' => $data['sub_kategori'],
            'base' => $data['base'],
            'lokasi_penggunaan' => implode(',', $data['lokasi_penggunaan']),
        ]);

        $riwayat = InputRekomendasi::where('id_user', Auth::id())
            ->orderByDesc('created_at')
            ->first();

        // ================= BOBOT ATRIBUT (SESUI PAPER) =================
        $bobot = [
            'kategori' => 0.30,
            'sub_kategori' => 0.25,
            'base' => 0.20,
            'lokasi' => 0.25,
        ];

        // ================= CONTENT-BASED SIMILARITY =================
        $hasil = [];
        $produkList = Produk::all();

        foreach ($produkList as $produk) {

            $similarity = 0;

            // --- KATEGORI ---
            if ($produk->kategori === $data['kategori']) {
                $similarity += $bobot['kategori'];
            }

            // --- SUB KATEGORI ---
            if ($produk->sub_kategori === $data['sub_kategori']) {
                $similarity += $bobot['sub_kategori'];
            }

            // --- BASE ---
            if ($produk->base === $data['base']) {
                $similarity += $bobot['base'];
            }

            // --- LOKASI (SET SIMILARITY) ---
            $produkLokasi = explode(',', $produk->lokasi_penggunaan);
            $irisan = array_intersect($produkLokasi, $data['lokasi_penggunaan']);

            if (count($data['lokasi_penggunaan']) > 0) {
                $lokasiScore = count($irisan) / count($data['lokasi_penggunaan']);
                $similarity += $lokasiScore * $bobot['lokasi'];
            }

            // --- KONVERSI KE PERSENTASE ---
            $persen = round($similarity * 100, 2);

            // --- THRESHOLD ---
            if ($persen >= 40) {
                $hasil[] = [
                    'produk' => $produk,
                    'score' => $persen
                ];
            }
        }

        // ================= SORTING =================
        usort($hasil, fn ($a, $b) => $b['score'] <=> $a['score']);

        return view('rekomendasi.index', [
            'hasil' => $hasil,
            'riwayat' => $riwayat
        ]);
    }
}
