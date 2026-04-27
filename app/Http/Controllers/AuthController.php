<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/dashboard')
                ->with('success', 'Login Anda Sebagai Admin Berhasil!');
        }

        if (Auth::guard('masyarakat')->attempt($credentials)) {
            return redirect('/home_masyarakat')
                ->with('success', 'Login Anda Sebagai Masyarakat Berhasil!');
        }

        if (Auth::guard('petugas')->attempt($credentials)) {
            return redirect('/home_petugas')
                ->with('success', 'Login Anda Sebagai Petugas Berhasil!');
        }

        return back()->with('error', 'Terjadi kesalahan, periksa email atau password anda!');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        } elseif (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}