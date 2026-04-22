@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- HEADER PROFILE -->
  <div class="page-header min-height-300 border-radius-xl mt-4"
       style="background-image: url('{{ asset('assets/img/curved-images/curved0.jpg') }}');">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>

  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">

      <!-- FOTO -->
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="{{ asset('assets/img/bruce-mars.jpg') }}"
               class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>

      <!-- NAMA -->
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">{{ $admin->name }}</h5>
          <p class="mb-0 font-weight-bold text-sm">
            Admin TrashGo
          </p>
        </div>
      </div>

      <!-- BUTTON EDIT -->
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto">
        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">
          Edit Profile
        </a>
      </div>

    </div>
  </div>

</div>

<!-- PROFILE DETAIL -->
<div class="container-fluid py-4">
  <div class="row">

    <!-- PROFILE INFO -->
    <div class="col-12 col-xl-6">
      <div class="card h-100">
        <div class="card-header pb-0 p-3 d-flex justify-content-between">
          <h6 class="mb-0">Profile Information</h6>
          <a href="{{ route('admin.profile.edit') }}">
            <i class="fas fa-user-edit text-secondary"></i>
          </a>
        </div>

        <div class="card-body p-3">
          <ul class="list-group">

            <li class="list-group-item border-0 ps-0">
              <strong>Nama:</strong> {{ $admin->name }}
            </li>

            <li class="list-group-item border-0 ps-0">
              <strong>Email:</strong> {{ $admin->email }}
            </li>

            <li class="list-group-item border-0 ps-0">
              <strong>No HP:</strong> {{ $admin->no_hp ?? '-' }}
            </li>

            <li class="list-group-item border-0 ps-0">
              <strong>Alamat:</strong> {{ $admin->alamat ?? '-' }}
            </li>

          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
