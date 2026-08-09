<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    protected $table = 'kebutuhan';
    protected $primaryKey = 'id_kebutuhan';

    public $timestamps = false;

    protected $fillable = ['nama'];

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_kebutuhan', 'id_kebutuhan', 'id_produk');
    }
}
