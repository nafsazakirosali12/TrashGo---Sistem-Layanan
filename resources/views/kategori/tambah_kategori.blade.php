@extends('layouts.app')

@section('page', 'Tambah Kategori')

@section('content')

<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div class="card">

        <!-- HEADER -->
        <div class="card-header">
          <h6>Tambah Kategori</h6>
        </div>

        <!-- BODY -->
        <div class="card-body">

          {{-- ERROR VALIDATION --}}
          @if ($errors->any())
            <div class="alert alert-danger text-white">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- FORM -->
          <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <!-- NAMA -->
            <div class="mb-3">
              <label class="form-label">Nama Kategori</label>
              <input 
                type="text" 
                name="nama_kategori" 
                class="form-control"
                value="{{ old('nama_kategori') }}"
                placeholder="Masukkan nama kategori"
              >
            </div>

            <!-- DESKRIPSI -->
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea 
                name="deskripsi" 
                class="form-control"
                rows="3"
                placeholder="Masukkan deskripsi (opsional)"
              >{{ old('deskripsi') }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-between">
              <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
              </a>

              <button type="submit" class="btn bg-gradient-primary">
                Simpan
              </button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection