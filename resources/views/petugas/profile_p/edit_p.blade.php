@extends('petugas.layouts_p.app_p')

@section('page', 'Ubah Profil')

@section('content')

<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card border-0 shadow-sm p-4">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="mb-0 fw-bold">
                        Ubah Profil Petugas
                    </h5>

                    <a href="{{ route('petugas.profile') }}"
                       class="btn btn-outline-secondary btn-sm">

                        Kembali

                    </a>

                </div>

                <!-- ALERT ERROR -->
                @if ($errors->any())

                    <div class="alert alert-danger text-white">

                        Profil gagal diubah!  
                        Periksa kembali input Anda.

                    </div>

                @endif

                <!-- FORM -->
                <form id="formProfil"
                      action="{{ route('petugas.profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- FOTO -->
                        <div class="col-md-4 text-center mb-4">

                            <img src="{{ $petugas->foto_petugas
                                ? asset('foto_petugas/' . $petugas->foto_petugas)
                                : asset('assets_admin/img/user.jpeg') }}"
                                class="border-radius-lg shadow-sm mb-3"
                                width="150"
                                height="150"
                                style="object-fit: cover;">

                            <div class="mb-3">

                                <label class="form-label">
                                    Foto Profil
                                </label>

                                <div class="input-group">

                                    <label for="foto_petugas"
                                        class="btn btn-outline-secondary mb-0">

                                        Pilih Foto

                                    </label>

                                    <input type="text"
                                        id="namaFoto"
                                        class="form-control ps-3"
                                        value="Belum ada foto terpilih"
                                        readonly>

                                </div>

                                <input type="file"
                                    name="foto_petugas"
                                    id="foto_petugas"
                                    class="d-none">

                            </div>

                        </div>

                        <!-- FORM INPUT -->
                        <div class="col-md-8">

                            <!-- NAMA TIM -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Tim
                                </label>

                                <input type="text"
                                       name="nama_tim"
                                       class="form-control"
                                       value="{{ old('nama_tim', $petugas->nama_tim) }}">

                            </div>

                            <!-- NAMA KETUA -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Ketua
                                </label>

                                <input type="text"
                                       name="nama_ketua"
                                       class="form-control"
                                       value="{{ old('nama_ketua', $petugas->nama_ketua) }}">

                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', $petugas->email) }}">

                            </div>

                            <!-- ALAMAT -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Alamat
                                </label>

                                <textarea name="alamat"
                                          rows="4"
                                          class="form-control">{{ old('alamat', $petugas->alamat) }}</textarea>

                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-4">

                                <label class="form-label">
                                    Kata Sandi
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Kosongkan jika tidak diubah">

                            </div>

                            <!-- BUTTON -->
                            <button type="button"
                                    id="btnSimpan"
                                    class="btn bg-gradient-success">

                                Simpan Perubahan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.getElementById('btnSimpan').addEventListener('click', function(){

    let form = document.getElementById('formProfil');

    let namaTim = document.querySelector('input[name="nama_tim"]').value;
    let namaKetua = document.querySelector('input[name="nama_ketua"]').value;
    let email = document.querySelector('input[name="email"]').value;
    let alamat = document.querySelector('textarea[name="alamat"]').value;

    // VALIDASI NAMA TIM
    if(namaTim.trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Nama tim kosong!',
            text: 'Silakan isi nama tim'
        });

        return;
    }

    // VALIDASI NAMA KETUA
    if(namaKetua.trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Nama ketua kosong!',
            text: 'Silakan isi nama ketua'
        });

        return;
    }

    // VALIDASI EMAIL
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

    // VALIDASI ALAMAT
    if(alamat.trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Alamat kosong!',
            text: 'Silakan isi alamat'
        });

        return;
    }

    // KONFIRMASI
    Swal.fire({

        title: 'Simpan perubahan?',
        text: "Pastikan data profil sudah benar",
        icon: 'question',

        showCancelButton: true,

        confirmButtonColor: '#28a745',
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

document.getElementById('foto_petugas').addEventListener('change', function () {

    const nama = this.files.length > 0
        ? this.files[0].name
        : 'Belum ada foto terpilih';

    document.getElementById('namaFoto').value = nama;

});


</script>
@endsection