<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiPenggunaan extends Model
{
    protected $table = 'lokasi_penggunaan';
    protected $primaryKey = 'id_lokasi_penggunaan';

    protected $fillable = ['nama'];

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_lokasi_penggunaan', 'id_lokasi_penggunaan', 'id_produk');
    }
}
