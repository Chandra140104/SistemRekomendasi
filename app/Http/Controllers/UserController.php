<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'no_telp' => 'required|string|max:30',
            'perusahaan_instansi' => 'nullable|string|max:100',
            'divisi_jabatan' => 'nullable|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
            'password' => 'required',
            'id_level' => 'required|exists:level,id_level'
        ]);

        // SIMPAN (password auto hash dari model)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'perusahaan_instansi' => $request->perusahaan_instansi,
            'divisi_jabatan' => $request->divisi_jabatan,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'lokasi_kota' => trim($request->provinsi . ', ' . $request->kota_kabupaten, ', '),
            'password' => $request->password,
            'id_level' => $request->id_level,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = User::with('level')->findOrFail($id);
        return view('pengguna.show', compact('user'));
    }

    public function profile()
    {
        $user = User::with('level')->findOrFail(Auth::id());

        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'name' => 'required|max:100',
            'no_telp' => 'required|string|max:30',
            'perusahaan_instansi' => 'nullable|string|max:100',
            'divisi_jabatan' => 'nullable|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
        ]);

        $user->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'perusahaan_instansi' => $request->perusahaan_instansi,
            'divisi_jabatan' => $request->divisi_jabatan,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'lokasi_kota' => trim($request->provinsi . ', ' . $request->kota_kabupaten, ', '),
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Data profil berhasil diupdate');
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
            'no_telp' => 'required|string|max:30',
            'perusahaan_instansi' => 'nullable|string|max:100',
            'divisi_jabatan' => 'nullable|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
            'id_level' => 'required|exists:level,id_level'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'perusahaan_instansi' => $request->perusahaan_instansi,
            'divisi_jabatan' => $request->divisi_jabatan,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'lokasi_kota' => trim($request->provinsi . ', ' . $request->kota_kabupaten, ', '),
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
