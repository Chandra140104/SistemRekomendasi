<?php

namespace App\Http\Controllers;

use App\Models\LokasiPenggunaan;
use Illuminate\Http\Request;

class LokasiPenggunaanController extends Controller
{
    /**
     * Tampilkan semua lokasi penggunaan
     */
    public function index()
    {
        $lokasiPenggunaan = LokasiPenggunaan::orderBy('id_lokasi_penggunaan', 'desc')->get();

        return view('lokasi-penggunaan.index', compact('lokasiPenggunaan'));
    }

    /**
     * Form tambah lokasi penggunaan
     */
    public function create()
    {
        return view('lokasi-penggunaan.create');
    }

    /**
     * Simpan lokasi penggunaan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:lokasi_penggunaan,nama',
        ]);

        LokasiPenggunaan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('lokasi-penggunaan.index')
            ->with('success', 'Lokasi penggunaan berhasil ditambahkan');
    }

    /**
     * Detail lokasi penggunaan
     */
    public function show($id)
    {
        $lokasiPenggunaan = LokasiPenggunaan::findOrFail($id);

        return view('lokasi-penggunaan.show', compact('lokasiPenggunaan'));
    }

    /**
     * Form edit lokasi penggunaan
     */
    public function edit($id)
    {
        $lokasiPenggunaan = LokasiPenggunaan::findOrFail($id);

        return view('lokasi-penggunaan.edit', compact('lokasiPenggunaan'));
    }

    /**
     * Update lokasi penggunaan
     */
    public function update(Request $request, $id)
    {
        $lokasiPenggunaan = LokasiPenggunaan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:lokasi_penggunaan,nama,' . $id . ',id_lokasi_penggunaan',
        ]);

        $lokasiPenggunaan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('lokasi-penggunaan.index')
            ->with('success', 'Lokasi penggunaan berhasil diperbarui');
    }

    /**
     * Hapus lokasi penggunaan
     */
    public function destroy($id)
    {
        $lokasiPenggunaan = LokasiPenggunaan::findOrFail($id);
        $lokasiPenggunaan->delete();

        return redirect()->route('lokasi-penggunaan.index')
            ->with('success', 'Lokasi penggunaan berhasil dihapus');
    }
}
