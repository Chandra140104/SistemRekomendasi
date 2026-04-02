<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')
            ->orderBy('id_produk', 'desc')
            ->get();

        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk' => 'required|string|max:100', // 🔥 FIX
            'kode' => 'required|string|max:50',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'sub_kategori' => 'required|string|max:50',
            'base' => 'required|string|max:50',
            'lokasi_penggunaan' => 'required|array',
            'fungsi' => 'required|string',
        ]);

        Produk::create([
            'produk' => $validated['produk'], // 🔥 FIX
            'kode' => $validated['kode'],
            'id_kategori' => $validated['id_kategori'],
            'sub_kategori' => $validated['sub_kategori'],
            'base' => $validated['base'],
            'lokasi_penggunaan' => implode(',', $validated['lokasi_penggunaan']),
            'fungsi' => $validated['fungsi'],
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();

        $produk->lokasi_penggunaan = explode(',', $produk->lokasi_penggunaan);

        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'produk' => 'required|string|max:100', // 🔥 FIX
            'kode' => 'required|string|max:50',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'sub_kategori' => 'required|string|max:50',
            'base' => 'required|string|max:50',
            'lokasi_penggunaan' => 'required|array',
            'fungsi' => 'required|string',
        ]);

        $produk->update([
            'produk' => $validated['produk'], // 🔥 FIX
            'kode' => $validated['kode'],
            'id_kategori' => $validated['id_kategori'],
            'sub_kategori' => $validated['sub_kategori'],
            'base' => $validated['base'],
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