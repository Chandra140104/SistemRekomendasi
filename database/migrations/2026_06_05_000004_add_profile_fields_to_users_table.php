<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_telp', 30)->nullable()->after('email');
            $table->string('perusahaan_instansi', 100)->nullable()->after('no_telp');
            $table->string('divisi_jabatan', 100)->nullable()->after('perusahaan_instansi');
            $table->string('lokasi_kota', 100)->nullable()->after('divisi_jabatan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'no_telp',
                'perusahaan_instansi',
                'divisi_jabatan',
                'lokasi_kota',
            ]);
        });
    }
};
