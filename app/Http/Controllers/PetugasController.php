<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pickup;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.tambah-akun.index', [
            'petugas' => $petugas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tim' => 'required|min:3|max:100',
            'nama_ketua' => 'required|min:3|max:100',
            'email' => 'required|email|unique:petugas',
            'password' => 'required|min:8',
            'alamat' => 'required|max:500',
            'status' => 'required|in:acctive,inacctive',
        ], [
            'nama_tim.required' => 'Nama tim wajib diisi.',
            'nama_ketua.required' => 'Nama ketua wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        // $validated['password'] = Hash::make($validated['password']);

        Petugas::create($validated);

        return redirect()->route('tambah-akun')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.tambah-akun.edit', [
            'petugas' => $petugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'nama_tim' => 'required|min:3|max:100',
    //         'nama_ketua' => 'required|min:3|max:100',
    //         'email' => 'required|email|unique:petugas',
    //         'password' => 'required|min:8',
    //         'alamat' => 'required|max:500',
    //         'status' => 'required|in:acctive,inacctive',
    //     ]);

    //     Petugas::findOrFail($id)->update($request->validated());

    //     return redirect('tambah-akun')->with('success', 'Data Berhasil Diubah');
    // }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $validated = $request->validate([
            'nama_tim' => 'required|min:3|max:100',
            'nama_ketua' => 'required|min:3|max:100',
            'email' => 'required|email|unique:petugas,email,' . $id,
            'password' => 'nullable|min:8',
            'alamat' => 'required|max:500',
            'status' => 'required|in:acctive,inacctive',
        ], [
            'nama_tim.required' => 'Nama tim wajib diisi.',
            'nama_tim.min' => 'Nama tim minimal 3 karakter.',
            'nama_tim.max' => 'Nama tim maksimal 100 karakter.',

            'nama_ketua.required' => 'Nama ketua wajib diisi.',
            'nama_ketua.min' => 'Nama ketua minimal 3 karakter.',
            'nama_ketua.max' => 'Nama ketua maksimal 100 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.min' => 'Password minimal 8 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        if (!empty($request->password)) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $petugas->update($validated);

        return redirect()->route('tambah-akun')
            ->with('success', 'Data Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('tambah-akun')->with ('success', 'Data Berhasil Dihapus');
    }

    public function history()
    {
        $riwayat_pickup = Pickup::with('order.kategori')
        -> where('petugas_id', auth('petugas')->id())
        -> where('status', 'complete')
        ->latest()
        ->paginate(10);

        return view('petugas.pages_p.riwayat_pickup', compact('riwayat_pickup'));
    }
}
