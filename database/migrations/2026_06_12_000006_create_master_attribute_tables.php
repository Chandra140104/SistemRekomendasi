<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_kategori', function (Blueprint $table) {
            $table->id('id_sub_kategori');
            $table->string('nama', 100)->unique();
        });

        Schema::create('lokasi_penggunaan', function (Blueprint $table) {
            $table->id('id_lokasi_penggunaan');
            $table->string('nama', 100)->unique();
        });

        Schema::create('kebutuhan', function (Blueprint $table) {
            $table->id('id_kebutuhan');
            $table->string('nama', 100)->unique();
        });

        Schema::create('produk_sub_kategori', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_sub_kategori');
            $table->primary(['id_produk', 'id_sub_kategori'], 'produk_sub_kategori_primary');
        });

        Schema::create('produk_lokasi_penggunaan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_lokasi_penggunaan');
            $table->primary(['id_produk', 'id_lokasi_penggunaan'], 'produk_lokasi_penggunaan_primary');
        });

        Schema::create('produk_kebutuhan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_kebutuhan');
            $table->primary(['id_produk', 'id_kebutuhan'], 'produk_kebutuhan_primary');
        });

        $produkRows = DB::table('produk')
            ->select('id_produk', 'sub_kategori', 'lokasi_penggunaan', 'kelebihan')
            ->get();

        $subKategoriIds = [];
        $lokasiIds = [];
        $kebutuhanIds = [];

        foreach ($produkRows as $produk) {
            foreach ($this->normalizeValues($produk->sub_kategori) as $nama) {
                $subKategoriIds[$nama] ??= DB::table('sub_kategori')->insertGetId([
                    'nama' => $nama,
                ], 'id_sub_kategori');

                DB::table('produk_sub_kategori')->insertOrIgnore([
                    'id_produk' => $produk->id_produk,
                    'id_sub_kategori' => $subKategoriIds[$nama],
                ]);
            }

            foreach ($this->normalizeValues($produk->lokasi_penggunaan) as $nama) {
                $lokasiIds[$nama] ??= DB::table('lokasi_penggunaan')->insertGetId([
                    'nama' => $nama,
                ], 'id_lokasi_penggunaan');

                DB::table('produk_lokasi_penggunaan')->insertOrIgnore([
                    'id_produk' => $produk->id_produk,
                    'id_lokasi_penggunaan' => $lokasiIds[$nama],
                ]);
            }

            foreach ($this->normalizeValues($produk->kelebihan) as $nama) {
                $kebutuhanIds[$nama] ??= DB::table('kebutuhan')->insertGetId([
                    'nama' => $nama,
                ], 'id_kebutuhan');

                DB::table('produk_kebutuhan')->insertOrIgnore([
                    'id_produk' => $produk->id_produk,
                    'id_kebutuhan' => $kebutuhanIds[$nama],
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_kebutuhan');
        Schema::dropIfExists('produk_lokasi_penggunaan');
        Schema::dropIfExists('produk_sub_kategori');
        Schema::dropIfExists('kebutuhan');
        Schema::dropIfExists('lokasi_penggunaan');
        Schema::dropIfExists('sub_kategori');
    }

    private function normalizeValues(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return collect(explode(',', $value))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }
};
