<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level';

    public $timestamps = false; // karena di tabel tidak ada created_at & updated_at

    protected $fillable = [
        'kode',
        'nama'
    ];
}