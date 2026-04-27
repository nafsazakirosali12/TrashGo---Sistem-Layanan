<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets_admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets_admin/img/favicon.png') }}">
  <title>
    TrashGo! - Dashboard
  </title>
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets_admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets_admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets_admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets_admin/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 d-flex flex-column min-vh-100">

  <!-- sidebar -->
    @include('layouts.sidebar')
  <!-- end sidebar -->

  <main class="main-content d-flex flex-column min-vh-100">

    <!-- Navbar -->
     @include('layouts.navbar')
    <!-- End Navbar -->

    <div class="flex-fill">
    <!-- dashboard -->
     @yield('content')
    <!-- end dashboard -->
    </div>

    <div>
    <!-- footer  -->
      @include('layouts.footer')
    <!-- end footer -->
    </div>
    
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets_admin/js/soft-ui-dashboard.min.js') }}"></script>
</body>

</html>