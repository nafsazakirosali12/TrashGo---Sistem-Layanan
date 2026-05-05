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

                        <h5 class="mb-3">Edit Profile</h5>

                        <form action="{{ route('masyarakat.profile_m.update') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <!-- FOTO -->
                            <div class="mb-3">
                                <label>Foto Profil</label>
                                <input type="file"
                                       name="foto_masyarakat"
                                       class="form-control">
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
                                <select name="jenis_kelamin"
                                        class="form-control"
                                        required>

                                    <option value="">-- pilih --</option>

                                    <option value="Laki-laki"
                                        {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>

                                    <option value="Perempuan"
                                        {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
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
                                <label>Password (kosongkan jika tidak diubah)</label>
                                <input type="password"
                                       name="password"
                                       class="form-control">
                            </div>

                            <!-- BUTTON -->
                            <div class="text-end">

                                <button type="submit"
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

@endsection