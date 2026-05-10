@extends('layouts.app')

@section('page', 'Ubah Profil')

@section('content')

<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">
      <div class="card p-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Ubah Profil</h5>

          <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary btn-sm">
            Kembali
          </a>
        </div>

        <!-- FORM -->
        @if ($errors->any())
          <div class="alert alert-danger text-white">
            Profil gagal diubah! Periksa kembali input Anda.
          </div>
        @endif

        <form id="formProfil" action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
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
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_admin" 
                       class="form-control" 
                       value="{{ $admin->nama_admin }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" 
                       class="form-control" 
                       value="{{ $admin->email }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" 
                       class="form-control" 
                       placeholder="Kosongkan jika tidak diubah">
              </div>

              <button type="button" id="btnSimpan" class="btn bg-gradient-primary">
                Simpan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById('btnSimpan').addEventListener('click', function(){

    let form = document.getElementById('formProfil');

    let nama = document.querySelector('input[name="nama_admin"]').value;
    let email = document.querySelector('input[name="email"]').value;

    // VALIDASI NAMA
    if(nama.trim() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Nama kosong!',
            text: 'Silakan isi nama admin'
        });
        return;
    }

    // VALIDASI EMAIL KOSONG
    if(email.trim() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Email kosong!',
            text: 'Silakan isi email'
        });
        return;
    }

    // VALIDASI FORMAT EMAIL
    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!regexEmail.test(email)){
        Swal.fire({
            icon: 'warning',
            title: 'Email tidak valid!',
            text: 'Masukkan format email yang benar'
        });
        return;
    }

    // KONFIRMASI
    Swal.fire({
        title: 'Simpan perubahan?',
        text: "Pastikan data profil sudah benar",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#B7C43A',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if(result.isConfirmed){

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Profil sedang diperbarui',
                timer: 1500,
                showConfirmButton: false
            });

            setTimeout(() => {
                form.submit();
            }, 1500);

        }

    });

});
</script>
@endsection