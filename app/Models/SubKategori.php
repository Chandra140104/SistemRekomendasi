<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'id_sub_kategori';

    public $timestamps = false;

    protected $fillable = ['nama'];

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_sub_kategori', 'id_sub_kategori', 'id_produk');
    }
}
