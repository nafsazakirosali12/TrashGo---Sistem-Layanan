@extends('masyarakat.layouts_m.app_m')

@section('content')
<div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('assets_pengguna/images/db1.jpeg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @auth('masyarakat')
                                <h1 class="m-b-20"><strong> Haii {{ Auth::guard('masyarakat')->user()->nama_masyarakat }}<br>Selamat datang di TrashGo!</strong></h1>
                            @else
                                <h1 class="m-b-20"><strong>Selamat datang<br>di TrashGo!</strong></h1>
                            @endauth
                            <p class="m-b-40">Platform pengangkutan sampah digital untuk masyarakat modern <br> Pesan layanan, pilih jadwal, dan bantu jaga kebersihan lingkungan hanya dalam satu klik </p>
                            <p><a class="btn hvr-hover" href="{{ route('masyarakat.pages.order') }}">Pesan Layanan</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('assets_pengguna/images/db2.jpeg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @auth('masyarakat')
                                <h1 class="m-b-20"><strong> Haii {{ Auth::guard('masyarakat')->user()->nama_masyarakat }}<br>Selamat datang di TrashGo!</strong></h1>
                            @else
                                <h1 class="m-b-20"><strong>Selamat datang<br>di TrashGo!</strong></h1>
                            @endauth
                            <p class="m-b-40">Platform pengangkutan sampah digital untuk masyarakat modern <br> Pesan layanan, pilih jadwal, dan bantu jaga kebersihan lingkungan hanya dalam satu klik </p>
                            <p><a class="btn hvr-hover" href="{{ route('masyarakat.pages.order') }}">Pesan Layanan</a></p>
                        </div>
                    </div>
                </div>     
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Keungggulan  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets_pengguna/images/keunggulan1.jpeg') }}" alt="">
                        <a class="btn hvr-hover" href="#">Praktis & Mudah Digunakan</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets_pengguna/images/keunggulan2.jpeg') }}" alt="">
                        <a class="btn hvr-hover" href="#">Layanan Cepat & Tepat Waktu</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets_pengguna/images/keunggulan3.jpeg') }}" alt="">
                        <a class="btn hvr-hover" href="#">Pembayaran Fleksibel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Keunggulan -->
	
    <!-- Start Categories -->
    <div class="box-add-products py-5">
        <div class="container">

            <!-- Judul Section -->
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size: 32px;">Kategori Layanan</h2>
                <p class="text-muted" style="font-size: 16px;">
                    Pilih jenis layanan pengangkutan sampah sesuai kebutuhan Anda dengan mudah dan praktis.
                </p>
            </div>

            <div class="row g-4">
                
                <!-- Organik -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="kategori-card text-center p-4 border rounded h-100 shadow-sm">
                        <img class="img-fluid mb-3 rounded" src="{{ asset('assets_pengguna/images/j1.jpeg') }}" alt="Organik" />
                        
                        <h4 class="fw-semibold" style="font-size: 20px; color:#93a267;">Organik</h4>
                        
                        <p class="text-muted" style="font-size: 15px; line-height: 1.6;">
                            Layanan pengangkutan sampah organik seperti sisa makanan, daun, dan limbah dapur 
                            yang mudah terurai secara alami serta dapat diangkut oleh petugas sesuai dengan jadwal
                            yang di inginkan.
                        </p>
                    </div>
                </div>

                <!-- Anorganik -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="kategori-card text-center p-4 border rounded h-100 shadow-sm">
                        <img class="img-fluid mb-3 rounded" src="{{ asset('assets_pengguna/images/j2.jpeg') }}" alt="Anorganik" />
                        
                        <h4 class="fw-semibold" style="font-size: 20px; color:#93a267;">Anorganik</h4>
                        
                        <p class="text-muted" style="font-size: 15px; line-height: 1.6;">
                            Layanan pengangkutan untuk sampah anorganik seperti plastik, kaca, kaleng, dan logam yang 
                            sulit terurai. Sampah akan dipilah dan didaur ulang agar dapat digunakan kembali 
                            serta mengurangi pencemaran lingkungan.
                        </p>
                    </div>
                </div>

                <!-- B3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="kategori-card text-center p-4 border rounded h-100 shadow-sm">
                        <img class="img-fluid mb-3 rounded" src="{{ asset('assets_pengguna/images/j3.jpeg') }}" alt="B3" />
                        
                        <h4 class="fw-semibold" style="font-size: 20px; color:#93a267;">B3</h4>
                        
                        <p class="text-muted" style="font-size: 15px; line-height: 1.6;">
                            Layanan pengangkutan khusus untuk limbah B3 (Bahan Berbahaya dan Beracun) seperti baterai, 
                            bahan kimia, dan limbah berbahaya lainnya. Pengelolaan dilakukan dengan standar 
                            keamanan tinggi untuk melindungi kesehatan dan lingkungan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- START FAQ -->
     <div class="products-box">
        <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Pertanyaan Umum</h1>
                    <p>Pertanyaan yang sering diajukan oleh pengguna TrashGo</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="accordion" id="faqAccordion">

                    <!-- FAQ 1 -->
                     <div class="card mb-3">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#faq1">
                                Apa itu TrashGo?
                            </a>
                        </div>
                        <div id="faq1" class="collapse show" data-parent="#faqAccordion">
                            <div class="card-body">
                                TrashGo! adalah platform digital yang membantu masyarakat dalam mengelola sampah secara lebih mudah, praktis, dan terintegrasi.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                     <div class="card mb-3">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#faq2">
                                Bagaimana cara melakukan pemesanan?
                            </a>
                        </div>
                        <div id="faq2" class="collapse" data-parent="#faqAccordion">
                            <ul class="card-body">
                                Cara melakukan pemesanan:
                                <li>1. Klik menu "Pesan" pada navbar.</li>
                                <li>2.  Lengkapi profil terlebih dahulu jika alamat atau nomor telepon belum diisi.</li>
                                <li>3. Isi formulir yang tersedia meliputi:</li>
                                <li>- Kategori layanan</li>
                                <li>- Lokasi Penjemputan</li>
                                <li>- Tanggal dan waktu</li>
                                <li>- Catatan</li>
                                <li>4. Isi formulir yang tersedia meliputi:</li>
                                <li>- Kategori layanan</li>
                                <li>- Tanggal dan waktu</li>
                                <li>- Catatan</li>
                                <li>5. Pastikan data pesanan sudah benar</li>
                                <li>6. Setelah semua data terisi, klik tombol "Pesan Sekarang"</li>
                                <li>7. Anda akan diarahkan ke halaman pembayaran</li>
                                <li>8. Pilih metode pembayaran yang tersedia</li>
                                <li>Jika menggunakan metode transfer, silakan kirim/upload bukti pembayaran</li>
                                <li>Setelah selesai, klik tombol **Selesai** untuk menyelesaikan proses pemesanan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#faq3">
                                Apakah layanan ini berbayar?
                            </a>
                        </div>
                        <div id="faq3" class="collapse" data-parent="#faqAccordion">
                            <div class="card-body">
                                Ya, layanan TrashGo! bersifat berbayar. Setiap kategori layanan memiliki tarif yang sama,
                                yaitu sebesar Rp10.000 untuk satu kali pengangkutan.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#faq4">
                              Apakah saya bisa menentukan jadwal pengambilan sendiri?
                            </a>
                        </div>
                        <div id="faq4" class="collapse" data-parent="#faqAccordion">
                            <div class="card-body">
                                Ya, pengguna dapat menentukan jadwal pengambilan sampah sesuai kebutuhan
                                <p>Anda dapat memilih tanggal dan waktu yang diinginkan saat mengisi formulir pemesanan, sehingga layanan menjadi lebih fleksibel.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#faq5">
                              Apakah saya mendapatkan point setelah melakukan pemesanan?
                            </a>
                        </div>
                        <div id="faq5" class="collapse" data-parent="#faqAccordion">
                            <div class="card-body">
                                Ya, setiap pengguna akan mendapatkan point setelah berhasil melakukan pemesanan layanan
                                <p>Point bisa ditukar pada saat pembayaran, jika mempunyai minimal 10 point</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

     <!-- END FAQ -->

    <!-- Start Galeri  -->
    <div style="background-color: #f8f9fa; width:100vw; margin-left:calc(-50vw + 50%);" class="py-5">
    <div class="container">
        <!-- judul -->
         <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size: 32px;">Galeri TrashGo!</h2>
                <p class="text-muted" style="font-size: 16px;">
                    Dokumentasi kegiatan layanan pengelolaan sampah
            </div>

        <!-- slide -->
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g1.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g2.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g3.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g4.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g5.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g6.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g7.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g8.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g9.jpeg') }}" alt="">
                </div>
            </div>
            <div class="item px-2">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets_pengguna/images/g10.jpeg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $('#faqAccordion .collapse').on('show.bs.collapse', function () {
            // $('.card-header').removeClass('active');
            // $(this).prev('.card-header').addClass('active');
    // $('#faqAccordion .collapse').on('hide.bs.collapse', function () {
    // 
    $('#faqAccordion .card-header').removeClass('active');
        $(this).prev('.card-header').removeClass('active');
    });

});
</script>
@endsection