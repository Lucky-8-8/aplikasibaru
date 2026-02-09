<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Login siswa
    if (Auth::guard('siswa')->attempt($request->only('email','password'))) {
        // Regenerate session & simpan guard siswa
        $request->session()->regenerate();
        session(['guard' => 'siswa']); // simpan guard di session
        return redirect()->intended('/siswa/dashboard');
    }

    // Login admin
    if (Auth::guard('admin')->attempt($request->only('email','password'))) {
        $request->session()->regenerate();
        session(['guard' => 'admin']); // simpan guard di session
        return redirect()->intended('/admin/dashboard');
    }

    

    return back()->with('error', 'Email atau password salah');
}


    public function logout(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
