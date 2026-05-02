@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="container mt-4">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <!-- HEADER BUTTON -->
            <div class="d-flex justify-content-between mb-3">

                <a href="{{ route('masyarakat.pages.home_masyarakat') }}"
                   class="btn btn-outline-secondary btn-sm">
                    ← Kembali ke Home
                </a>

                <a href="{{ route('masyarakat.profile_m.edit_m') }}"
                   class="btn btn-sm"style="background-color:#93a267; border-color:#93a267; color:white;">
                    Edit Profile
                </a>

            </div>

            <div class="row g-3">

                <!-- LEFT PROFILE CARD -->
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

                <!-- RIGHT DETAIL CARD -->
                <div class="col-md-8">

                    <div class="card shadow-sm border-0 p-4 h-100">

                        <h5 class="mb-3">Informasi Akun</h5>

                        <div class="table-responsive">

                            <table class="table table-striped align-middle">

                                <tr>
                                    <th width="180">Nama</th>
                                    <td>{{ $user->nama_masyarakat }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <th>No Telepon</th>
                                    <td>{{ $user->no_telepon ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $user->alamat ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Password</th>
                                    <td>********</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection