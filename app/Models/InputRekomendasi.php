<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputRekomendasi extends Model
{
    protected $table = 'input_rekomendasi';
    protected $primaryKey = 'id_input';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'kategori',
        'sub_kategori',
        'kelebihan',
        'lokasi_penggunaan',
    ];
}
