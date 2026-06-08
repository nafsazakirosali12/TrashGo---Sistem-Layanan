@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="container mt-4 mb-5 pb-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <!-- ALERT SUCCESS -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ALERT ERROR VALIDASI -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- HEADER -->
            <div class="d-flex justify-content-between mb-3">

                <a href="{{ route('masyarakat.profile_m') }}"
                   class="btn btn-outline-secondary btn-sm">
                    ← Kembali
                </a>

            </div>

            <div class="row g-3">

                <!-- LEFT PREVIEW -->
                <div class="col-md-4">

                    <div class="card shadow-sm border-0 text-center p-4 h-100">

                        @if($user->foto_masyarakat)
                            <img src="{{ asset($user->foto_masyarakat) }}"
                                 class="rounded-circle mx-auto mb-3 shadow"
                                 width="130" height="130"
                                 style="object-fit: cover;">
                        @else
                            <i class="fa fa-user-circle fa-6x text-secondary mb-3"></i>
                        @endif

                        <h5 class="mb-1">{{ $user->nama_masyarakat }}</h5>
                        <small class="text-muted">{{ $user->email }}</small>

                    </div>

                </div>

                <!-- FORM -->
                <div class="col-md-8">

                    <div class="card shadow-sm border-0 p-4 h-100">

                        <h5 class="mb-3">Ubah Profil</h5>

                        <form id="formProfile"
                            action="{{ route('masyarakat.profile_m.update') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="redirect" value="{{ request('redirect') }}">

                            <!-- FOTO -->
                            <div class="mb-3">
                                <label>Foto Profil</label>

                                <div class="input-group">

                                    <label for="foto_masyarakat"
                                        class="btn btn-outline-secondary mb-0">
                                        Pilih Foto
                                    </label>

                                    <input type="file"
                                        name="foto_masyarakat"
                                        id="foto_masyarakat"
                                        hidden>

                                    <input type="text"
                                        id="namaFoto"
                                        class="form-control ps-3"
                                        value="Belum ada foto terpilih"
                                        readonly>

                                </div>
                            </div>

                            <!-- NAMA -->
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text"
                                       name="nama_masyarakat"
                                       value="{{ old('nama_masyarakat', $user->nama_masyarakat) }}"
                                       class="form-control"
                                       required>
                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $user->email) }}"
                                       class="form-control"
                                       required>
                            </div>

                            <!-- NO TELEPON -->
                            <div class="mb-3">
                                <label>No Telepon</label>
                                <input type="text"
                                       name="no_telepon"
                                       value="{{ old('no_telepon', $user->no_telepon) }}"
                                       class="form-control"
                                       required>
                            </div>

                            <!-- JENIS KELAMIN -->
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>

                                @php
                                    $jk = strtolower(trim($user->jenis_kelamin));
                                @endphp

                                <select name="jenis_kelamin"
                                        class="form-control"
                                        required>

                                    <option value="">-- pilih --</option>

                                    <option value="Laki-laki"
                                        {{ $jk == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>

                                    <option value="Perempuan"
                                        {{ $jk == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>
                            </div>

                            <!-- ALAMAT -->
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                          class="form-control"
                                          required>{{ old('alamat', $user->alamat) }}</textarea>
                            </div>

                            <!-- PASSWORD (OPTIONAL) -->
                            <div class="mb-3">
                                <label>Kata Sandi (kosongkan jika tidak diubah)</label>
                                <input type="password"
                                       name="password"
                                       class="form-control">
                            </div>

                            <!-- BUTTON -->
                            <div class="text-end">

                                <button type="button" 
                                        id="btnSimpan"
                                        class="btn btn-sm"
                                        style="background-color:#93a267; border-color:#93a267; color:white;">
                                    Simpan Perubahan
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.getElementById('btnSimpan').addEventListener('click', function(){

    let form = document.getElementById('formProfile');

    let nama = document.querySelector('input[name="nama_masyarakat"]').value;
    let email = document.querySelector('input[name="email"]').value;
    let telepon = document.querySelector('input[name="no_telepon"]').value;
    let gender = document.querySelector('select[name="jenis_kelamin"]').value;
    let alamat = document.querySelector('textarea[name="alamat"]').value;

    // VALIDASI NAMA
    if(nama.trim() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Nama kosong!',
            text: 'Silakan isi nama'
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

    // VALIDASI TELEPON
    if(telepon.trim() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Nomor telepon kosong!',
            text: 'Silakan isi nomor telepon'
        });
        return;
    }

    // VALIDASI JENIS KELAMIN
    if(gender == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Jenis kelamin belum dipilih!',
            text: 'Silakan pilih jenis kelamin'
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
        confirmButtonColor: '#93a267',
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

document.getElementById('foto_masyarakat').addEventListener('change', function () {

    const nama = this.files.length > 0
        ? this.files[0].name
        : 'Belum ada foto terpilih';

    document.getElementById('namaFoto').value = nama;

});

</script>
@endsection