@extends('petugas.layouts_p.app_p')

@section('page', 'Profil')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="page-header min-height-300 border-radius-xl mt-4"
         style="background-image: url('{{ asset('assets/img/curved-images/curved0.jpg') }}');
                background-position-y: 50%;">

        <span class="mask bg-gradient-success opacity-6"></span>

    </div>

    <!-- PROFILE HEADER -->
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden border-0">

        <div class="row gx-4 align-items-center">

            <!-- FOTO -->
            <div class="col-auto">

                <div class="avatar avatar-xxl position-relative">

                    <img src="{{ $petugas->foto_petugas 
                        ? asset('foto_petugas/' . $petugas->foto_petugas) 
                        : asset('assets_admin/img/user.jpeg') }}"
                        class="w-100 border-radius-lg shadow-sm"
                        style="object-fit: cover;">
                </div>

            </div>

            <!-- NAMA -->
            <div class="col">

                <div class="h-100">

                    <h4 class="mb-1">
                        {{ $petugas->nama_ketua }}
                    </h4>

                    <p class="mb-0 text-sm text-muted fw-bold">
                        Ketua {{ $petugas->nama_tim }}
                    </p>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="col-auto">

                <a href="{{ route('petugas.profile_p.edit_p') }}"
                   class="btn bg-gradient-success mb-0">

                    Ubah Profil

                </a>

            </div>

        </div>

    </div>

</div>

<!-- CONTENT -->
<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card h-100 border-0 shadow-sm">

                <!-- HEADER -->
                <div class="card-header pb-0 p-4 border-0">

                    <h5 class="mb-0 fw-bold">
                        Informasi Profil Petugas
                    </h5>

                </div>

                <!-- BODY -->
                <div class="card-body pt-3 px-4 pb-4">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <tbody>

                                <tr>
                                    <th width="250"
                                        class="text-sm text-secondary fw-semibold border-0">
                                        Nama Tim
                                    </th>

                                    <td class="border-0">
                                        {{ $petugas->nama_tim }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-sm text-secondary fw-semibold border-0">
                                        Nama Ketua
                                    </th>

                                    <td class="border-0">
                                        {{ $petugas->nama_ketua }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-sm text-secondary fw-semibold border-0">
                                        Email
                                    </th>

                                    <td class="border-0">
                                        {{ $petugas->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-sm text-secondary fw-semibold border-0">
                                        Alamat
                                    </th>

                                    <td class="border-0">
                                        {{ $petugas->alamat }}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-sm text-secondary fw-semibold border-0">
                                        Status
                                    </th>

                                    <td class="border-0">

                                        @if($petugas->status == 'acctive')

                                            <span class="badge bg-success px-3 py-2">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="badge bg-danger px-3 py-2">
                                                Non-aktif
                                            </span>

                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-sm text-secondary fw-semibold border-0">
                                        Kata Sandi
                                    </th>

                                    <td class="border-0">
                                        ********
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection