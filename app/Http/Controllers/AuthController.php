<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Jika sudah login
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Jika bukan POST → tampilkan halaman login
        if (!$request->isMethod('post')) {
            return view('login.login');
        }

        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // 🔥 LANGSUNG KE DASHBOARD (ROLE DITANGANI DI ROUTE)
            return redirect()->route('dashboard')
                ->with('login_success', true);
        }

        // Jika gagal
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