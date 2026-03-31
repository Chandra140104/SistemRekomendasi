<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
    /**
     * Tampilkan semua user
     */
    public function index()
    {
        $users = User::with('level')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        $levels = Level::all();
        return view('user.create', compact('levels'));
    }

    /**
     * Simpan user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'id_level' => 'required|exists:level,id_level'
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Detail user (untuk modal)
     */
    public function show($id)
    {
        $user = User::with('level')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Form edit user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $levels = Level::all();

        return view('user.edit', compact('user', 'levels'));
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $id . ',id_user',
            'id_level' => 'required|exists:level,id_level'
        ]);

        $data = $request->only(['name', 'email', 'id_level']);

        // kalau password diisi → update
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    /**
     * Hapus user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}