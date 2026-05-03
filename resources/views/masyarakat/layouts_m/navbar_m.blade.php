<header class="main-header">

        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets_admin/img/logo.png') }}" class="logo" alt="" style="max-width: 120px; height: auto;">
                </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.home_masyarakat') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.about_us') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.order') }}">Order</a></li>
                        

                        <!-- ICON POINT, NOTIFIKASI, DROPDOWN -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.point') }}"><i class="fa fa-coins"></i></a></li>
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route ('masyarakat.pages.notifikasi') }}">
                                <i class="fa fa-bell"></i>

                                @php
                                    $orders = $orders ?? collect();
                                    $pembayarans = $pembayarans ?? collect();

                                    $totalNotif = $orders->count() + $pembayarans->count();
                                @endphp

                                @if($totalNotif > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $totalNotif }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-bars fs-4"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right" style="min-width: 220px; border-radius: 8px; padding: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: none;">
                                <li style="margin-bottom: 5px;"><a href="{{ route('masyarakat.profile_m') }}" style="display: block; padding: 8px 15px; border-radius: 5px; transition: 0.3s;">
                                    <i class="fa fa-user-circle" style="width: 20px; text-align: center; margin-right: 8px;"></i>My Profile</a>
                                </li>
                                <li style="margin-bottom: 5px;"><a href="{{ route('masyarakat.pages.riwayat_order') }}" style="display: block; padding: 8px 15px; border-radius: 5px; transition: 0.3s;">
                                    <i class="fa fa-history" style="width: 20px; text-align: center; margin-right: 8px;"></i>Riwayat Order</a>
                                </li>
                                <li><hr style="margin: 10px 0; border-top: 1px solid #eee;"></li>
                                <li style="margin-bottom: 5px;"><a href="/login" style="display: block; padding: 8px 15px; border-radius: 5px; color: #007bff; transition: 0.3s;">
                                    <i class="fa fa-sign-in-alt" style="width: 20px; text-align: center; margin-right: 8px;"></i> Sign In</a>
                                </li>
                                <li><a href="/logout" style="display: block; padding: 8px 15px; border-radius: 5px; color: #dc3545; transition: 0.3s;">
                                    <i class="fa fa-sign-out-alt" style="width: 20px; text-align: center; margin-right: 8px;"></i> Sign Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>