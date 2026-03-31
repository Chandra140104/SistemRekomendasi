<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        
        if (!$request->isMethod('post')) {
            return view('login.login');
        }

        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           
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