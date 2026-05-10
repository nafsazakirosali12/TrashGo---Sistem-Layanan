<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all(); // ambil semua data
        return view('admin.kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('kategori.tambah_kategori');
    //     return view('kategori.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Kategori $kategori)
    // {
    //     return view('kategori.edit_kategori', compact('kategori'));
    //     return view('kategori.edit', compact('kategori'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        if (
            $kategori->nama_kategori == $request->nama_kategori &&
            $kategori->deskripsi == $request->deskripsi
        ) {
            return redirect()->back()
                ->with('warning', 'Tidak ada peruahan data');
        }

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
