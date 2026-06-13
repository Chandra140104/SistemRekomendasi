<?php

namespace App\Http\Controllers;

use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Tampilkan semua sub kategori
     */
    public function index()
    {
        $subKategori = SubKategori::orderBy('id_sub_kategori', 'desc')->get();

        return view('sub-kategori.index', compact('subKategori'));
    }

    /**
     * Form tambah sub kategori
     */
    public function create()
    {
        return view('sub-kategori.create');
    }

    /**
     * Simpan sub kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:sub_kategori,nama',
        ]);

        SubKategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('sub-kategori.index')
            ->with('success', 'Sub kategori berhasil ditambahkan');
    }

    /**
     * Detail sub kategori
     */
    public function show($id)
    {
        $subKategori = SubKategori::findOrFail($id);

        return view('sub-kategori.show', compact('subKategori'));
    }

    /**
     * Form edit sub kategori
     */
    public function edit($id)
    {
        $subKategori = SubKategori::findOrFail($id);

        return view('sub-kategori.edit', compact('subKategori'));
    }

    /**
     * Update sub kategori
     */
    public function update(Request $request, $id)
    {
        $subKategori = SubKategori::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:sub_kategori,nama,' . $id . ',id_sub_kategori',
        ]);

        $subKategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('sub-kategori.index')
            ->with('success', 'Sub kategori berhasil diperbarui');
    }

    /**
     * Hapus sub kategori
     */
    public function destroy($id)
    {
        $subKategori = SubKategori::findOrFail($id);
        $subKategori->delete();

        return redirect()->route('sub-kategori.index')
            ->with('success', 'Sub kategori berhasil dihapus');
    }
}
