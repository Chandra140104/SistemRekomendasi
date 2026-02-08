<?php

namespace App\Services;

use App\Models\Produk;

class RekomendasiRuleService
{
    public static function cari($input)
    {
        $produkList = Produk::all();
        $hasil = [];

        foreach ($produkList as $produk) {

            $skor = 0;
            $maxSkor = 100;

            // ======================
            // KATEGORI (30)
            // ======================
            if ($produk->kategori === $input['kategori']) {
                $skor += 30;
            }

            // ======================
            // SUB KATEGORI (25)
            // ======================
            if ($produk->sub_kategori === $input['sub_kategori']) {
                $skor += 25;
            }

            // ======================
            // BASE (15)
            // ======================
            if ($produk->base === $input['base']) {
                $skor += 15;
            }

            // ======================
            // LOKASI PENGGUNAAN (30)
            // ======================
            $produkLokasi = explode(',', $produk->lokasi_penggunaan);
            $inputLokasi  = $input['lokasi_penggunaan'];

            $lokasiCocok = array_intersect($produkLokasi, $inputLokasi);

            if (count($inputLokasi) > 0) {
                $skorLokasi = (count($lokasiCocok) / count($inputLokasi)) * 30;
                $skor += $skorLokasi;
            }

            // ======================
            // SIMPAN HASIL
            // ======================
            if ($skor > 0) {
                $produk->skor = round(($skor / $maxSkor) * 100, 2); // %
                $hasil[] = $produk;
            }
        }

        // ======================
        // SORTING SKOR DESC
        // ======================
        usort($hasil, function ($a, $b) {
            return $b->skor <=> $a->skor;
        });

        return collect($hasil);
    }
}
