<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // TAMPILAN LOGIN
    public function login()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Login sebagai siswa
        if (Auth::guard('siswa')->attempt($request->only('email','password'))) {
            return redirect('/siswa/dashboard');
        }

        // Login sebagai admin
        if (Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // LOGOUT
   public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}

}