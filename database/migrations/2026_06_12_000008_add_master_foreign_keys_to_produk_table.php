<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            if (! Schema::hasColumn('produk', 'id_sub_kategori')) {
                $table->unsignedBigInteger('id_sub_kategori')->nullable()->after('id_kategori');
            }

            if (! Schema::hasColumn('produk', 'id_lokasi_penggunaan')) {
                $table->unsignedBigInteger('id_lokasi_penggunaan')->nullable()->after('id_sub_kategori');
            }

            if (! Schema::hasColumn('produk', 'id_kebutuhan')) {
                $table->unsignedBigInteger('id_kebutuhan')->nullable()->after('id_lokasi_penggunaan');
            }
        });

        $produkIds = DB::table('produk')->pluck('id_produk');

        foreach ($produkIds as $idProduk) {
            $idSubKategori = DB::table('produk_sub_kategori')
                ->where('id_produk', $idProduk)
                ->min('id_sub_kategori');

            $idLokasiPenggunaan = DB::table('produk_lokasi_penggunaan')
                ->where('id_produk', $idProduk)
                ->min('id_lokasi_penggunaan');

            $idKebutuhan = DB::table('produk_kebutuhan')
                ->where('id_produk', $idProduk)
                ->min('id_kebutuhan');

            DB::table('produk')
                ->where('id_produk', $idProduk)
                ->update([
                    'id_sub_kategori' => $idSubKategori,
                    'id_lokasi_penggunaan' => $idLokasiPenggunaan,
                    'id_kebutuhan' => $idKebutuhan,
                ]);
        }
    }

    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $columns = collect(['id_sub_kategori', 'id_lokasi_penggunaan', 'id_kebutuhan'])
                ->filter(fn ($column) => Schema::hasColumn('produk', $column))
                ->values()
                ->all();

            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
