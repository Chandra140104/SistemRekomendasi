<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Kebutuhan;
use App\Models\LokasiPenggunaan;
use App\Models\Produk;
use App\Models\SubKategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukPdfSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('produk_kebutuhan')->truncate();
        DB::table('produk_lokasi_penggunaan')->truncate();
        DB::table('produk_sub_kategori')->truncate();
        DB::table('produk')->truncate();
        DB::table('kebutuhan')->truncate();
        DB::table('lokasi_penggunaan')->truncate();
        DB::table('sub_kategori')->truncate();
        DB::table('kategori')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        foreach ($this->products() as $item) {
            $kategori = Kategori::firstOrCreate(['nama' => $item['kategori']]);

            $produk = Produk::create([
                'nama' => $item['nama'],
                'id_kategori' => $kategori->id_kategori,
            ]);

            $produk->subKategori()->sync($this->ids(SubKategori::class, $item['sub_kategori'], 'id_sub_kategori'));
            $produk->lokasiPenggunaan()->sync($this->ids(LokasiPenggunaan::class, $item['lokasi'], 'id_lokasi_penggunaan'));
            $produk->kebutuhan()->sync($this->ids(Kebutuhan::class, $item['kelebihan'], 'id_kebutuhan'));
        }
    }

    private function ids(string $model, array $names, string $key): array
    {
        return collect($names)
            ->map(fn (string $name) => $model::firstOrCreate(['nama' => $name])->{$key})
            ->all();
    }

    private function products(): array
    {
        return [
            ['kategori' => 'Acrylic', 'nama' => 'FOXACRYL ENAMEL', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Indoor', 'Beton Indoor'], 'kelebihan' => ['Cepat Kering', 'Tahan Kimia', 'Tahan Gesekan']],
            ['kategori' => 'Acrylic', 'nama' => 'FOXACRYL PRIMER', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Kimia', 'Tahan Gesekan', 'Bersinar Saat Gelap']],
            ['kategori' => 'Acrylic', 'nama' => 'FOXANYL ESTER GF', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Panas']],
            ['kategori' => 'Acrylic', 'nama' => 'FOXANYL ESTER', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Kayu', 'Beton Indoor', 'Besi Indoor'], 'kelebihan' => ['Anti Karat', 'Cepat Kering']],
            ['kategori' => 'Acrylic', 'nama' => 'FOXAGLOW', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Kayu', 'Beton Outdoor', 'Besi Outdoor'], 'kelebihan' => ['Anti Karat', 'Cepat Kering']],
            ['kategori' => 'Acrylic', 'nama' => 'FOXACRYL-FP', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Kayu', 'Beton Outdoor', 'Besi Outdoor'], 'kelebihan' => ['Cepat Kering']],

            ['kategori' => 'Alkyd', 'nama' => 'FOXABITUMEN - VARNISH', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Cepat Kering']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXAKYD-ZP', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Indoor', 'Beton Indoor'], 'kelebihan' => ['Anti Karat']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXAKYD-ZC', 'sub_kategori' => ['Primer 1st'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Anti Karat']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXAKYD ENAMEL', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Cepat Kering', 'Tahan Kimia', 'Tahan Gesekan']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXAKYD-QD', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Cepat Kering', 'Tahan Karat']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXA-NC', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Indoor', 'Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Tahan Abrasi', 'Tahan Kimia', 'Tahan Bahan Bakar']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXABITUMEN - VARNISH', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia', 'Tahan Bahan Bakar', 'Tahan Gesekan']],
            ['kategori' => 'Alkyd', 'nama' => 'FOXARUST', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia', 'Cepat Kering']],

            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-HB', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia', 'Tahan Bahan Bakar', 'Tahan Gesekan']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-TC', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Outdoor', 'Kayu', 'Lantai Basah'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX ETCH', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi', 'Kayu', 'Lantai Basah'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-ZP', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Indoor'], 'kelebihan' => ['Anti Karat']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXATAR', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX LINING', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-GF', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-MULTI', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-PHENOLIC', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX WEAR MIC', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Besi Indoor', 'Beton Indoor'], 'kelebihan' => ['Tahan Kimia', 'Tahan Gesekan']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-PRIME', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Cepat Kering', 'Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-DS', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Lantai Basah'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-UW', 'sub_kategori' => ['Finish Gloss 2nd', 'Finish Gloss 3rd'], 'lokasi' => ['Dalam Air'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX', 'sub_kategori' => ['Mortar'], 'lokasi' => ['Dalam Air'], 'kelebihan' => ['Tahan Gesekan', 'Tahan Kimia']],
            ['kategori' => 'Epoxy', 'nama' => 'FOXAPOX-CR', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Indoor'], 'kelebihan' => ['Tahan Gesekan', 'Tahan Kimia']],

            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE-GL GLOSS', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor', 'Marka'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE-GL MATTE', 'sub_kategori' => ['Finish Matte 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor', 'Marka'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor', 'Marka'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE NEW', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATIC', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Outdoor', 'Besi Outdoor'], 'kelebihan' => ['Tahan Sinar Matahari']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE-NS', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Sinar Matahari', 'Cepat Kering']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE PU 2K', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Cepat Kering']],
            ['kategori' => 'Polyurethane', 'nama' => 'FOXATHANE CLEAR', 'sub_kategori' => ['Primer 1st'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Cepat Kering', 'Tahan Sinar Matahari']],

            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-EP GLOSS', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Karat', 'Tahan Abrasi']],
            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-EP MATTE', 'sub_kategori' => ['Finish Matte 3rd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Karat', 'Tahan Abrasi']],
            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-EP', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Karat', 'Tahan Abrasi']],
            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-FT', 'sub_kategori' => ['Protect 1st', 'Protect 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Abrasi', 'Anti Karat']],
            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-SP', 'sub_kategori' => ['Protect 1st', 'Protect 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Panas', 'Anti Karat', 'Tahan Abrasi']],
            ['kategori' => 'Zinc Rich', 'nama' => 'FOXAZINC-AL', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Cepat Kering']],

            ['kategori' => 'Heat Resistance', 'nama' => 'FOXAPRO 200', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Panas', 'Tahan Sinar Matahari']],
            ['kategori' => 'Heat Resistance', 'nama' => 'FOXAPRO 400', 'sub_kategori' => ['Protect 1st', 'Protect 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Panas', 'Tahan Sinar Matahari']],
            ['kategori' => 'Heat Resistance', 'nama' => 'FOXAMINE', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Besi Outdoor', 'Beton Outdoor'], 'kelebihan' => ['Tahan Panas']],

            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR PRIMER', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Tahan Abrasi', 'Tahan Benturan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-WB', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Tidak Bau Tajam']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-ESD', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Anti Static']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXACEM ECC-85', 'sub_kategori' => ['Mortar'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Tidak Bau Tajam']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR CLEAR', 'sub_kategori' => ['Mortar', 'Primer 1st'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Viskositas Rendah']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR CLEAR NEW', 'sub_kategori' => ['Primer 1st'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Oily Surfaces']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR CLEAR SL', 'sub_kategori' => ['Primer 1st'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Tahan Abrasi', 'Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXA SEALER WB FLOOR', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah'], 'kelebihan' => ['Cepat Kering']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXABOND SBR', 'sub_kategori' => ['Mortar'], 'lokasi' => ['Lantai Basah'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-TC', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Lantai Kering', 'Beton Indoor'], 'kelebihan' => ['Tahan Gesekan', 'Tahan Kimia']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-SLW', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Lantai Kering', 'Beton Indoor'], 'kelebihan' => ['Tahan Kimia']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-SLW NEW', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Tahan Gesekan', 'Tahan Kimia']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR CLEAR', 'sub_kategori' => ['Primer 1st'], 'lokasi' => ['Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-ESD', 'sub_kategori' => ['Finish Gloss 3rd'], 'lokasi' => ['Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Anti Static', 'Cepat Kering', 'Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAPLAST', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Outdoor', 'Lantai Basah', 'Marka'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXAFLOOR-NO SKID', 'sub_kategori' => ['Finish Matte 3rd'], 'lokasi' => ['Beton Indoor', 'Lantai Kering'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Epoxy Floor', 'nama' => 'FOXACOTE 3000', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Basah', 'Lantai Basah', 'Marka'], 'kelebihan' => ['Tahan Gesekan']],

            ['kategori' => 'Decorative', 'nama' => 'FOXASEALER WB', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Room Interior'], 'kelebihan' => ['Cepat Kering']],
            ['kategori' => 'Decorative', 'nama' => 'FOXAFILLER', 'sub_kategori' => ['Mortar'], 'lokasi' => ['Room Interior'], 'kelebihan' => ['Cepat Kering']],
            ['kategori' => 'Decorative', 'nama' => 'FOXAPLAST', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Room Interior'], 'kelebihan' => ['Mudah Dibersihkan']],
            ['kategori' => 'Decorative', 'nama' => 'FOXAGARD', 'sub_kategori' => ['Primer 1st', 'Primer 2nd'], 'lokasi' => ['Room Interior', 'Room Exterior'], 'kelebihan' => ['Mudah Dibersihkan', 'Tidak Bau Tajam']],
            ['kategori' => 'Decorative', 'nama' => 'FOXASHIELD', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Room Exterior'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Decorative', 'nama' => 'FOXAFLEX', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Room Exterior'], 'kelebihan' => ['Elastis']],
            ['kategori' => 'Decorative', 'nama' => 'FOXAPROOF', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Room Exterior'], 'kelebihan' => ['Tahan Cuaca']],

            ['kategori' => 'Waterproofing', 'nama' => 'FOXAPROOF', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Waterproofing', 'nama' => 'FOXASEAL', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Tahan Cuaca']],
            ['kategori' => 'Waterproofing', 'nama' => 'FOXALASTIC', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Tidak Bau Tajam', 'Elastis']],
            ['kategori' => 'Waterproofing', 'nama' => 'FOXABOND SBR', 'sub_kategori' => ['Mortar'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Tahan Gesekan']],
            ['kategori' => 'Waterproofing', 'nama' => 'FOXATHANE', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Elastis', 'Tahan Benturan']],
            ['kategori' => 'Waterproofing', 'nama' => 'FOXATIC', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Beton Outdoor'], 'kelebihan' => ['Elastis', 'Tahan Karat', 'Tahan Sinar Matahari']],

            ['kategori' => 'Anti Fouling', 'nama' => 'FOXALING-TR', 'sub_kategori' => ['Finish 3rd'], 'lokasi' => ['Dalam Air'], 'kelebihan' => ['Bawah Kapal', 'Cepat Kering']],
            ['kategori' => 'Anti Fouling', 'nama' => 'FOXALING-SP', 'sub_kategori' => ['Protect 3rd'], 'lokasi' => ['Dalam Air'], 'kelebihan' => ['Bawah Kapal']],
        ];
    }
}
