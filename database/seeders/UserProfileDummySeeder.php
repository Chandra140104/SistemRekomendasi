<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileDummySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')
            ->where('id_level', 2)
            ->where('email', 'chandrabgs140104@gmail.com')
            ->update([
                'no_telp' => '081234567890',
                'perusahaan_instansi' => 'PT Primantara Nusa Samasta',
                'divisi_jabatan' => 'Staff Marketing',
                'provinsi' => 'Jawa Barat',
                'kota_kabupaten' => 'Bandung',
                'lokasi_kota' => 'Jawa Barat, Bandung',
            ]);

        DB::table('users')
            ->where('id_level', 2)
            ->where('email', 'budisularso810@gmail.com')
            ->update([
                'no_telp' => '081298765432',
                'perusahaan_instansi' => 'CV Sukses Mandiri',
                'divisi_jabatan' => 'Purchasing',
                'provinsi' => 'Jawa Tengah',
                'kota_kabupaten' => 'Semarang',
                'lokasi_kota' => 'Jawa Tengah, Semarang',
            ]);
    }
}
