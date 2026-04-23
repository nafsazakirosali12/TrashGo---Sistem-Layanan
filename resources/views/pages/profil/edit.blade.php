@extends('layouts.app')

@section('page', 'Edit Profil')

@section('content')

<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">
      <div class="card p-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Edit Profil</h5>

          <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary btn-sm">
            Kembali
          </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">

            <!-- FOTO -->
            <div class="col-md-4 text-center mb-3">
              <img src="{{ $admin->foto_admin 
                  ? asset($admin->foto_admin) 
                  : asset('assets/img/team-1.jpg') }}"
                  class="border-radius-lg shadow-sm mb-2"
                  width="120">
              <input type="file" name="foto_admin" class="form-control mt-2">
            </div>

            <div class="col-md-8">

              <!-- NAMA -->
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_admin" 
                       class="form-control" 
                       value="{{ $admin->nama_admin }}">
              </div>

              <!-- EMAIL -->
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" 
                       class="form-control" 
                       value="{{ $admin->email }}">
              </div>

              <!-- PASSWORD -->
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" 
                       class="form-control" 
                       placeholder="Kosongkan jika tidak diubah">
              </div>

              <!-- BUTTON -->
              <button type="submit" class="btn bg-gradient-primary">
                Simpan Perubahan
              </button>

            </div>

          </div>

        </form>

      </div>
    </div>
  </div>

</div>

@endsection