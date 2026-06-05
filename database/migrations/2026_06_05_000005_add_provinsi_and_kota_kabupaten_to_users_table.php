<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provinsi', 100)->nullable()->after('divisi_jabatan');
            $table->string('kota_kabupaten', 100)->nullable()->after('provinsi');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'provinsi',
                'kota_kabupaten',
            ]);
        });
    }
};
