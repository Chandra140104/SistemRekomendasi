<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Tampilkan semua kategori
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori,nama'
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Detail kategori (opsional/modal)
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Form edit kategori
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori,nama,' . $id . ',id_kategori'
        ]);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Hapus kategori
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}