<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('level')->get();
        return view('pengguna.index', compact('users'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('pengguna.create', compact('levels'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'id_level' => 'required|exists:level,id_level'
        ]);

        // SIMPAN (password auto hash dari model)
        User::create($request->only([
            'name',
            'email',
            'password',
            'id_level'
        ]));

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = User::with('level')->findOrFail($id);
        return view('pengguna.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $levels = Level::all();

        return view('pengguna.edit', compact('user', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $id . ',id_user',
            'id_level' => 'required|exists:level,id_level'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}