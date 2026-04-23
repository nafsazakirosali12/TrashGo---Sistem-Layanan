<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('pages.profil.index', compact('admin'));
    }

    public function edit()
    {
        $admin = Auth::guard('admin')->user();

        return view('pages.profil.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $request->validate([
            'nama_admin' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:5',
            'foto_admin' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $admin->nama_admin = $request->nama_admin;
        $admin->email = $request->email;

        if ($request->filled('password') && trim($request->password) !== '') {
            $admin->password = $request->password;
        }

        // FOTO (kalau upload)
        if ($request->hasFile('foto_admin')) {
        $file = $request->file('foto_admin');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets_admin/img'), $namaFile);
        $admin->foto_admin = 'assets_admin/img/' . $namaFile;
    }

        $admin->save();

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil berhasil diupdate!');
    }
}