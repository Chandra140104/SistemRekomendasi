<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('produk')->update([
            'sub_kategori' => null,
            'lokasi_penggunaan' => null,
            'kelebihan' => null,
        ]);
    }

    public function down(): void
    {
        // Kolom legacy dikosongkan permanen. Nilai tetap tersedia lewat tabel relasi.
    }
};
