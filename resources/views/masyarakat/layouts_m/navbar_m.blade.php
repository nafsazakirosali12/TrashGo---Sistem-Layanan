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
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.home_masyarakat') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.about_us') }}">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('masyarakat.pages.order') }}">Pesan</a></li>
                        
                        <!-- ICON POINT, NOTIFIKASI, DROPDOWN -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('masyarakat.pages.point') }}" data-toggle="tooltip" title="Lihat Point">
                                <i class="fa fa-coins"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route ('masyarakat.pages.notifikasi') }}" data-toggle="tooltip" title="Lihat Notifikasi">
                                <i class="fa fa-bell"></i>

                                {{-- DOT = status berubah --}}
                                @if($hasStatusUpdate)
                                    <span class="notif-dot position-absolute top-0 start-100 translate-middle"></span>
                                @endif

                                 {{-- ANGKA = notif baru --}}
                                @if(auth('masyarakat')->check())
                                    @php
                                        $lastRead = auth('masyarakat')->user()->last_read_notif;

                                        $newNotif = $notificationsAll->filter(function ($n) use ($lastRead) {
                                            return !$lastRead || $n->created_at->gt($lastRead);
                                        });

                                        $totalNotif = $newNotif->count();
                                    @endphp

                                    @if($totalNotif > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $totalNotif }}
                                        </span>
                                    @endif
                                @endif
                            </a>
                        </li>
                        @auth('masyarakat')
                            <li class="dropdown nav-item d-flex align-items-center">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="fa fa-bars fs-4"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 220px; border-radius: 8px; padding: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: none;">
                                    <li style="margin-bottom: 5px;">
                                        <a href="{{ route('masyarakat.profile_m') }}" style="display: block; padding: 8px 15px; border-radius: 5px; transition: 0.3s;">
                                            <i class="fa fa-user-circle" style="width: 20px; text-align: center; margin-right: 8px;"></i>Profil Saya
                                        </a>
                                    </li>
                                    <li style="margin-bottom: 5px;">
                                        <a href="{{ route('masyarakat.pages.riwayat_order') }}" style="display: block; padding: 8px 15px; border-radius: 5px; transition: 0.3s;">
                                            <i class="fa fa-history" style="width: 20px; text-align: center; margin-right: 8px;"></i>Riwayat Pesanan
                                        </a>
                                    </li>
                                    
                                    <li><hr style="margin: 10px 0; border-top: 1px solid #eee;"></li>
                                    
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: block; padding: 8px 15px; border-radius: 5px; color: #dc3545; transition: 0.3s;">
                                            <i class="fa fa-sign-out-alt" style="width: 20px; text-align: center; margin-right: 8px;"></i> Keluar
                                        </a>
                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item d-flex align-items-center me-2">
                                <a href="/login" class="btn btn-sm mb-1 ml-2" style="border: 2px solid #b0b435; color: #b0b435; font-weight: 600; border-radius: 8px; padding: 6px 18px; background: transparent; transition: 0.3s;">
                                    Masuk
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="/register" class="btn btn-sm mb-1 ml-2" style="background-color: #b0b435; color: #ffffff; font-weight: 600; border-radius: 8px; padding: 6px 18px; border: 2px solid #b0b435; transition: 0.3s;">
                                    Daftar
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>

    <style>
        .notif-dot{
        width: 10px;
        height: 10px;

        background-color: #b0b435;
        border-radius: 50%;

        border: 2px solid white;
    }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof $ !== 'undefined') {
                $('[data-toggle="tooltip"]').tooltip({
                    template: '<div class="tooltip" role="tooltip"><div class="tooltip-inner" style="background-color: #b0b435; color: #ffffff; border-radius: 6px; padding: 6px 12px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"></div></div>'
                });   
            }
        });
    </script>