<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('id_produk', 'desc')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kode' => 'required|string|max:50',
            'kategori' => 'required|string|max:50',
            'sub_kategori' => 'required|string|max:50',
            'base' => 'required|string|max:50',
            'lokasi_penggunaan' => 'required|array',
            'fungsi' => 'required|string',
        ]);

        Produk::create([
            'nama' => $validated['nama'],
            'kode' => $validated['kode'],
            'kategori' => $validated['kategori'],
            'sub_kategori' => $validated['sub_kategori'],
            'base' => $validated['base'],

            // 🔥 FIX UTAMA
            'lokasi_penggunaan' => implode(',', $validated['lokasi_penggunaan']),

            'fungsi' => $validated['fungsi'],
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

   public function show($id)
{
    $produk = Produk::findOrFail($id);
    return view('produk.show', compact('produk'));
}

    public function edit(Produk $produk)
    {
        // ubah string → array agar checkbox tercentang
        $produk->lokasi_penggunaan = explode(',', $produk->lokasi_penggunaan);

        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kode' => 'required|string|max:50',
            'kategori' => 'required|string|max:50',
            'sub_kategori' => 'required|string|max:50',
            'base' => 'required|string|max:50',
            'lokasi_penggunaan' => 'required|array',
            'fungsi' => 'required|string',
        ]);

        $produk->update([
            'nama' => $validated['nama'],
            'kode' => $validated['kode'],
            'kategori' => $validated['kategori'],
            'sub_kategori' => $validated['sub_kategori'],
            'base' => $validated['base'],

            // 🔥 FIX UTAMA
            'lokasi_penggunaan' => implode(',', $validated['lokasi_penggunaan']),

            'fungsi' => $validated['fungsi'],
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
