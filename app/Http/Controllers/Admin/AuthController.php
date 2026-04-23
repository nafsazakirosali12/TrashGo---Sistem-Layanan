<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.admin');
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
                ->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Terjadi kesalahan, periksa email atau password anda!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login')
        ->with('success', 'Berhasil logout!');
    }
}