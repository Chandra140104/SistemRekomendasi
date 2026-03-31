<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // kalau sudah login → langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // kalau belum submit form → tampilkan halaman login
        if (!$request->isMethod('post')) {
            return view('login.login');
        }

        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔥 tetap di login page + kirim trigger SweetAlert
            return back()->with('login_success', true);
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}