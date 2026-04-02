<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kode',
        'id_kategori', // 🔥 ganti
        'sub_kategori',
        'base',
        'lokasi_penggunaan',
        'fungsi'
    ];

    // 🔥 RELASI KE KATEGORI
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}