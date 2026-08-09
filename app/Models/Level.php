<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level';

    public $timestamps = false; // karena tabel tidak menggunakan timestamp

    protected $fillable = [
        'kode',
        'nama'
    ];
}
