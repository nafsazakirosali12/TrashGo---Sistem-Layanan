@extends('layouts.app')

@section('page', 'Edit Kategori')

@section('content')

<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div class="card">

        <!-- HEADER -->
        <div class="card-header">
          <h6>Edit Kategori</h6>
        </div>

        <!-- BODY -->
        <div class="card-body">

          <!-- ERROR -->
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
          <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div class="mb-3">
              <label>Nama Kategori</label>
              <input type="text" 
                     name="nama_kategori" 
                     class="form-control"
                     value="{{ $kategori->nama_kategori }}" required>
            </div>

            <!-- DESKRIPSI -->
            <div class="mb-3">
              <label>Deskripsi</label>
              <textarea name="deskripsi" class="form-control">{{ $kategori->deskripsi }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-between">
              <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
              </a>

              <button type="submit" class="btn bg-gradient-primary">
                Update
              </button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection