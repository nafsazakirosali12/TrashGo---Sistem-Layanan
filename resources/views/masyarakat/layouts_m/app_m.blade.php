<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>TrashGo!</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <<link rel="shortcut icon" href="{{ asset('assets_pengguna/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets_pengguna/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets_pengguna/css/bootstrap.min.css') }}">

    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets_pengguna/css/style.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets_pengguna/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets_pengguna/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- NAVBAR -->
   @include('masyarakat.layouts_m.navbar_m')
    <!-- End Main Top -->

    <!-- HOME -->
    @yield('content')

    <!-- FOOTER -->
    @include('masyarakat.layouts_m.footer_m')


    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets_pengguna/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/bootstrap.min.js') }}"></script>

    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets_pengguna/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/inewsticker.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets_pengguna/js/custom.js') }}"></script>

</body>
</html>