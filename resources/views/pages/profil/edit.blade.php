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

          <a href="{{ route('pages.profil.index') }}" class="btn btn-secondary btn-sm">
            Kembali
          </a>
        </div>

        <!-- FORM -->
        <form action="#" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">

            <!-- FOTO -->
            <div class="col-md-4 text-center mb-3">
              <img src="{{ asset('assets/img/team-1.jpg') }}" 
                   class="border-radius-lg shadow-sm mb-2"
                   width="120">

              <input type="file" class="form-control mt-2">
            </div>

            <div class="col-md-8">

              <!-- NAMA -->
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" value="Admin Oca">
              </div>

              <!-- EMAIL -->
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="admin@gmail.com">
              </div>

              <!-- PASSWORD -->
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan password baru">
              </div>

              <!-- BUTTON -->
              <button class="btn bg-gradient-primary">
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