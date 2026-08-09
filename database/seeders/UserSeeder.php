<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'id_level' => 1,
                'name' => 'Administrator',
                'email_verified_at' => now(),
                'password' => Hash::make('12345'),
            ]
        );
    }
}
