<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    // HOME
    public function index()
    {
        return view('masyarakat.pages.home_masyarakat');
    }

    // PROFILE LIHAT
    public function profile()
    {
        $user = Auth::guard('masyarakat')->user();
        return view('masyarakat.profile_m.index_m', compact('user'));
    }

    // PROFILE EDIT
    public function editProfile()
    {
        $user = Auth::guard('masyarakat')->user();
        return view('masyarakat.profile_m.edit_m', compact('user'));
    }

    // UPDATE PROFILE
    public function updateProfile(Request $request)
{
    $user = Auth::guard('masyarakat')->user();

    // VALIDASI WAJIB
    $request->validate([
        'nama_masyarakat' => 'required|string|max:100',
        'email' => 'required|email',
        'no_telepon' => 'required|string|max:20',
        'jenis_kelamin' => 'required|string',
        'alamat' => 'required|string',
        'foto_masyarakat' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'password' => 'nullable|min:6',
    ]);

    // FOTO (kalau ada)
    if ($request->hasFile('foto_masyarakat')) {

        if ($user->foto_masyarakat && file_exists(public_path($user->foto_masyarakat))) {
            unlink(public_path($user->foto_masyarakat));
        }

        $file = $request->file('foto_masyarakat');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/profile_masyarakat'), $filename);

        $user->foto_masyarakat = 'uploads/profile_masyarakat/'.$filename;
    }

    // DATA WAJIB (TIDAK BOLEH NULL)
    $user->nama_masyarakat = $request->nama_masyarakat;
    $user->email = $request->email;
    $user->no_telepon = $request->no_telepon;
    $user->jenis_kelamin = $request->jenis_kelamin;
    $user->alamat = $request->alamat;

    // PASSWORD OPTIONAL (AMAN)
    if ($request->filled('password') && trim($request->password) !== '') {
            $user->password = $request->password;
        }

    $user->save();

    // return redirect()->route('masyarakat.profile_m')->with('success', 'Profil berhasil diupdate');
    return redirect()->route('masyarakat.pages.order')
    ->with('success', 'Profil berhasil diperbarui, silakan lanjut membuat pesanan.');
}
  
}