@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Tambah Akun Petugas</h4>

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

  <form action="{{ route('tambah-akun.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Nama Tim</label>
      <input type="text" name="nama_tim" class="form-control">
    </div>

    <div class="mb-3">
      <label>Nama Ketua</label>
      <input type="text" name="nama_ketua" class="form-control">
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="acctive">Acctive</option>
        <option value="inacctive">Inacctive</option>
      </select>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('tambah-akun') }}" class="btn btn-primary btn-sm">Kembali</a>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </div>
  </form>
</div>
@endsection