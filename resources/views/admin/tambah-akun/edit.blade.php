@extends('layouts.app')

@section('page', 'Edit')

@section('content')
    <div class="container">
    <h4>Edit Akun Petugas</h4>

    @if (session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

    <form action="{{ route('tambah-akun.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="mb-3">
        <label>Nama Tim</label>
        <input type="text" name="nama_tim" class="form-control"
            value="{{ old('nama_tim', $petugas->nama_tim) }}">
        </div>

        <div class="mb-3">
        <label>Nama Ketua</label>
        <input type="text" name="nama_ketua" class="form-control"
            value="{{ old('nama_ketua', $petugas->nama_ketua) }}">
        </div>

        <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
            value="{{ old('email', $petugas->email) }}">
        </div>

        <div class="mb-3">
        <label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat', $petugas->alamat) }}</textarea>
        </div>

        <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="acctive" {{ $petugas->status == 'acctive' ? 'selected' : '' }}>Acctive</option>
            <option value="inacctive" {{ $petugas->status == 'inacctive' ? 'selected' : '' }}>Inacctive</option>
        </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('tambah-akun') }}" class="btn btn-primary btn-sm">Kembali</a>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
    </form>
    </div>
@endsection