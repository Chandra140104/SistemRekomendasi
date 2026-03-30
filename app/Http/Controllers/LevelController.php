<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Tampilkan semua data (VIEW)
     */
    public function index()
    {
        $levels = Level::all();
        return view('level.index', compact('levels'));
    }

    /**
     * SHOW (untuk modal)
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);
        return view('level.show', compact('level'));
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('level.edit', compact('level'));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $request->validate([
            'kode' => 'required|max:20',
            'nama' => 'required|max:50',
        ]);

        $level->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('level.index')
            ->with('success', 'Data berhasil diupdate');
    }
}