@extends('layouts.app')

@section('page', 'Profil')

@section('content')

<div class="container-fluid">

  <!-- HEADER -->
  <div class="page-header min-height-300 border-radius-xl mt-4"
       style="background-image: url('{{ asset('assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>

  <!-- PROFILE HEADER -->
  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">

      <!-- FOTO -->
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="{{ asset('assets/img/team-1.jpg') }}"
               class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>

      <!-- NAMA -->
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">Admin Oca</h5>
          <p class="mb-0 font-weight-bold text-sm">Admin</p>
        </div>
      </div>

      <!-- BUTTON EDIT -->
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto text-end">
        <!-- <a href="{{ route('pages.profil.edit') }}" 
           class="btn bg-gradient-primary btn-sm">
          Edit Profile
        </a> -->
        <a href="{{ route('pages.profil.edit') }}" 
          class="btn bg-gradient-primary btn-sm">
          Edit Profile
        </a>
      </div>

    </div>
  </div>
</div>

<!-- CONTENT -->
<div class="container-fluid py-4">
  <div class="row">

    <div class="col-12">
      <div class="card h-100">

        <!-- HEADER -->
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Profile Information</h6>
        </div>

        <!-- BODY -->
        <div class="card-body p-3">
          <div class="row">

            <!-- NAMA -->
            <div class="col-md-4 mb-3">
              <p class="text-xs text-secondary mb-1">Nama</p>
              <h6 class="mb-0">Admin Oca</h6>
            </div>

            <!-- EMAIL -->
            <div class="col-md-4 mb-3">
              <p class="text-xs text-secondary mb-1">Email</p>
              <h6 class="mb-0">admin@gmail.com</h6>
            </div>

            <!-- PASSWORD -->
            <div class="col-md-4 mb-3">
              <p class="text-xs text-secondary mb-1">Password</p>
              <h6 class="mb-0">********</h6>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection