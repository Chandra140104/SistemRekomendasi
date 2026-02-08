<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputRekomendasi extends Model
{
    protected $table = 'input_rekomendasi';
    protected $primaryKey = 'id_input';

    public $timestamps = false; // ⬅️ PENTING (karena cuma pakai created_at)

    protected $fillable = [
        'id_user',
        'kategori',
        'sub_kategori',
        'base',
        'lokasi_penggunaan',
        'created_at', // ⬅️ TAMBAHKAN
    ];

    protected $casts = [
        'created_at' => 'datetime', // ⬅️ BIAR BISA FORMAT
    ];
}
