<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    public function showLinkRequestForm(): View
    {
        return view('login.forgot-password');
    }

    public function updateForgottenPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:3'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email tidak terdaftar pada sistem.',
                ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Password berhasil diubah. Silakan login dengan password baru.');
    }
}

