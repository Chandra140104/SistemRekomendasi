<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $columns = collect(['sub_kategori', 'lokasi_penggunaan', 'kelebihan'])
                ->filter(fn ($column) => Schema::hasColumn('produk', $column))
                ->values()
                ->all();

            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }

    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            if (! Schema::hasColumn('produk', 'sub_kategori')) {
                $table->text('sub_kategori')->nullable()->after('nama');
            }

            if (! Schema::hasColumn('produk', 'lokasi_penggunaan')) {
                $table->text('lokasi_penggunaan')->nullable()->after('sub_kategori');
            }

            if (! Schema::hasColumn('produk', 'kelebihan')) {
                $table->text('kelebihan')->nullable()->after('lokasi_penggunaan');
            }
        });
    }
};
