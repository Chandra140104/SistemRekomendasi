<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function subKategori()
    {
        return $this->belongsToMany(SubKategori::class, 'produk_sub_kategori', 'id_produk', 'id_sub_kategori');
    }

    public function lokasiPenggunaan()
    {
        return $this->belongsToMany(LokasiPenggunaan::class, 'produk_lokasi_penggunaan', 'id_produk', 'id_lokasi_penggunaan');
    }

    public function kebutuhan()
    {
        return $this->belongsToMany(Kebutuhan::class, 'produk_kebutuhan', 'id_produk', 'id_kebutuhan');
    }

    public function getSubKategoriAttribute($value): string
    {
        return implode(', ', $this->getSubKategoriLabelsAttribute());
    }

    public function getLokasiPenggunaanAttribute($value): string
    {
        return implode(', ', $this->getLokasiPenggunaanLabelsAttribute());
    }

    public function getKelebihanAttribute($value): string
    {
        return implode(', ', $this->getKebutuhanLabelsAttribute());
    }

    public function getSubKategoriLabelsAttribute(): array
    {
        $items = $this->relationLoaded('subKategori')
            ? $this->getRelation('subKategori')
            : $this->subKategori()->get();

        return $items
            ->pluck('nama')
            ->filter()
            ->values()
            ->all();
    }

    public function getLokasiPenggunaanLabelsAttribute(): array
    {
        $items = $this->relationLoaded('lokasiPenggunaan')
            ? $this->getRelation('lokasiPenggunaan')
            : $this->lokasiPenggunaan()->get();

        return $items
            ->pluck('nama')
            ->filter()
            ->values()
            ->all();
    }

    public function getKebutuhanLabelsAttribute(): array
    {
        $items = $this->relationLoaded('kebutuhan')
            ? $this->getRelation('kebutuhan')
            : $this->kebutuhan()->get();

        return $items
            ->pluck('nama')
            ->filter()
            ->values()
            ->all();
    }
}
