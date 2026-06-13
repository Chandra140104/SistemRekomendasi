<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan;
use Illuminate\Http\Request;

class KebutuhanController extends Controller
{
    /**
     * Tampilkan semua kebutuhan
     */
    public function index()
    {
        $kebutuhan = Kebutuhan::orderBy('id_kebutuhan', 'desc')->get();

        return view('kebutuhan.index', compact('kebutuhan'));
    }

    /**
     * Form tambah kebutuhan
     */
    public function create()
    {
        return view('kebutuhan.create');
    }

    /**
     * Simpan kebutuhan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kebutuhan,nama',
        ]);

        Kebutuhan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kebutuhan.index')
            ->with('success', 'Kebutuhan berhasil ditambahkan');
    }

    /**
     * Detail kebutuhan
     */
    public function show($id)
    {
        $kebutuhan = Kebutuhan::findOrFail($id);

        return view('kebutuhan.show', compact('kebutuhan'));
    }

    /**
     * Form edit kebutuhan
     */
    public function edit($id)
    {
        $kebutuhan = Kebutuhan::findOrFail($id);

        return view('kebutuhan.edit', compact('kebutuhan'));
    }

    /**
     * Update kebutuhan
     */
    public function update(Request $request, $id)
    {
        $kebutuhan = Kebutuhan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:kebutuhan,nama,' . $id . ',id_kebutuhan',
        ]);

        $kebutuhan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kebutuhan.index')
            ->with('success', 'Kebutuhan berhasil diperbarui');
    }

    /**
     * Hapus kebutuhan
     */
    public function destroy($id)
    {
        $kebutuhan = Kebutuhan::findOrFail($id);
        $kebutuhan->delete();

        return redirect()->route('kebutuhan.index')
            ->with('success', 'Kebutuhan berhasil dihapus');
    }
}
