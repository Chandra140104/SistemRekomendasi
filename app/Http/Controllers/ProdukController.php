<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kebutuhan;
use App\Models\LokasiPenggunaan;
use App\Models\Produk;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();

        $query = Produk::with(['kategori', 'lokasiPenggunaan']);

        if ($request->id_kategori) {
            $query->where('id_kategori', $request->id_kategori);
        }

        $produk = $query->orderBy('id_produk', 'desc')->get();

        return view('produk.index', compact('produk', 'kategori'));
    }

    public function create()
    {
        return view('produk.create', $this->getProductFormOptions());
    }

    public function catalog()
    {
        $produkLanding = Produk::with([
            'kategori',
            'subKategori',
            'lokasiPenggunaan',
            'kebutuhan',
        ])
            ->orderBy('nama')
            ->get();

        $kategoriLanding = $produkLanding
            ->pluck('kategori.nama')
            ->filter()
            ->unique()
            ->values();

        $totalProdukLanding = $produkLanding->count();

        return view('katalog.index', compact(
            'produkLanding',
            'kategoriLanding',
            'totalProdukLanding'
        ));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request, false);

        $produk = Produk::create([
            'nama' => $validated['nama'],
            'id_kategori' => $validated['id_kategori'],
        ]);

        $this->syncProductRelations($produk, $validated);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::with([
            'kategori',
            'subKategori',
            'lokasiPenggunaan',
            'kebutuhan',
        ])->findOrFail($id);

        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $produk->load(['subKategori', 'lokasiPenggunaan', 'kebutuhan']);

        return view('produk.edit', array_merge(
            ['produk' => $produk],
            $this->getProductFormOptions()
        ));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $this->validateProduct($request, true);

        $produk->update([
            'nama' => $validated['nama'],
            'id_kategori' => $validated['id_kategori'],
        ]);

        $this->syncProductRelations($produk, $validated);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->subKategori()->detach();
        $produk->lokasiPenggunaan()->detach();
        $produk->kebutuhan()->detach();
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    private function getProductFormOptions(): array
    {
        return [
            'kategori' => Kategori::orderBy('nama')->get(),
            'subKategoriOptions' => SubKategori::orderBy('nama')->get(),
            'lokasiOptions' => LokasiPenggunaan::orderBy('nama')->get(),
            'kebutuhanOptions' => Kebutuhan::orderBy('nama')->get(),
        ];
    }

    private function validateProduct(Request $request, bool $isUpdate): array
    {
        $rules = [
            'nama' => 'required|string|max:100',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'sub_kategori' => 'required|array|min:1',
            'sub_kategori.*' => 'exists:sub_kategori,id_sub_kategori',
            'lokasi_penggunaan' => 'required|array|min:1',
            'lokasi_penggunaan.*' => 'exists:lokasi_penggunaan,id_lokasi_penggunaan',
            'kelebihan' => 'required|array|min:1',
            'kelebihan.*' => 'exists:kebutuhan,id_kebutuhan',
        ];

        return $request->validate($rules);
    }

    private function syncProductRelations(Produk $produk, array $validated): void
    {
        $produk->subKategori()->sync($validated['sub_kategori']);
        $produk->lokasiPenggunaan()->sync($validated['lokasi_penggunaan']);
        $produk->kebutuhan()->sync($validated['kelebihan']);
    }
}
