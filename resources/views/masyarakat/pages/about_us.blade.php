@extends('masyarakat.layouts_m.app_m')

@section('content')
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>TENTANG KAMI</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a class="nav-link" href="{{ route('masyarakat.pages.home_masyarakat') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">TENTANG KAMI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

<div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="{{ asset('assets_pengguna/images/about.jpeg') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 text-justify">
                    <h2 class="noo-sh-title-top">Kami adalah <span>TrashGo!</span></h2>
                    <p>
                        TrashGo! adalah cara baru dalam mengelola sampah dengan lebih sederhana, lebih cerdas, dan sepenuhnya terintegrasi. Kami menghadirkan pengalaman digital yang mengubah proses yang sebelumnya rumit menjadi sesuatu yang praktis dan efisien. 
                    </p>
                    <p>
                        Dengan TrashGo!, pengguna dapat dengan mudah menjadwalkan pengambilan sampah sesuai kebutuhan, mengelompokkan jenis sampah dengan lebih terarah, serta memantau seluruh proses dalam satu platform yang intuitif.
                        Lebih dari sekadar layanan, kami membangun sistem yang mendorong perubahan perilaku. Melalui fitur reward berbasis poin, setiap langkah kecil dalam mengelola sampah menjadi kontribusi nyata yang bernilai.
                    </p>
                        Kami percaya bahwa masa depan lingkungan yang lebih baik dimulai dari sistem yang lebih baik. Oleh karena itu, TrashGo! hadir untuk menghadirkan solusi yang tidak hanya efisien, tetapi juga berkelanjutan.
                    </p>
                    <p>
                        Karena sistem yang lebih baik menciptakan kebiasaan yang lebih baik dan kebiasaan yang lebih baik menciptakan masa depan yang lebih bersih.
                    </p>
					<a class="btn hvr-hover nav-link" href="{{ route('masyarakat.pages.about_us') }}">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Kami Terpercaya</h3>
                        <p>TrashGo! hadir sebagai solusi terpercaya dalam pengelolaan sampah. Kami berkomitmen memberikan layanan yang konsisten, aman, dan dapat diandalkan untuk membantu masyarakat menjaga lingkungan tetap bersih. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Kami Profesional</h3>
                        <p>Dengan sistem digital yang terintegrasi, TrashGo! memberikan layanan yang cepat, terstruktur, dan efisien. Kami memastikan setiap proses, mulai dari penjadwalan hingga pengambilan sampah, berjalan secara profesional. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Kami Kompeten</h3>
                        <p>Kami memahami pentingnya pengelolaan sampah yang tepat. Melalui fitur klasifikasi dan sistem yang terarah, TrashGo! membantu pengguna mengelola sampah dengan lebih efektif dan berkelanjutan. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4 justify-content-center">
        <div class="col-12 text-center mb-4">
            <h2 class="noo-sh-title">Tim Kami</h2>
        </div>

            <!-- 1 -->
            <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                <div class="hover-team">
                    <div class="our-team">
                        <img src="{{ asset('assets_pengguna/images/team/nafsa.jpeg') }}" alt="">
                        <div class="team-content">
                            <h3 class="title">Nafsa Z.R</h3>
                            <span class="post">Product Owner</span>
                        </div>

                        <ul class="social">
                            <li>
                                <a href="https://instagram.com/o.ocaa_" target="_blank" class="fab fa-instagram"></a>
                            </li>
                        </ul>

                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                <div class="hover-team">
                    <div class="our-team">
                        <img src="{{ asset('assets_pengguna/images/team/rizka.jpeg') }}" alt="">
                        <div class="team-content">
                            <h3 class="title">Rizkania H.P</h3>
                            <span class="post">Scrum Master</span>
                        </div>

                        <ul class="social">
                            <li>
                                <a href="https://instagram.com/rhprii_" target="_blank" class="fab fa-instagram"></a>
                            </li>
                        </ul>

                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 -->
            <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                <div class="hover-team">
                    <div class="our-team">
                        <img src="{{ asset('assets_pengguna/images/team/nanda.jpeg') }}" alt="">
                        <div class="team-content">
                            <h3 class="title">Ananda A.F</h3>
                            <span class="post">Developer</span>
                        </div>

                        <ul class="social">
                            <li>
                                <a href="https://instagram.com/nndlizz" target="_blank" class="fab fa-instagram"></a>
                            </li>
                        </ul>

                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4 -->
            <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                <div class="hover-team">
                    <div class="our-team">
                        <img src="{{ asset('assets_pengguna/images/team/citra.jpeg') }}" alt="">
                        <div class="team-content">
                            <h3 class="title">Citra S.A</h3>
                            <span class="post">Developer</span>
                        </div>

                        <ul class="social">
                            <li>
                                <a href="https://instagram.com/citra.sbna" target="_blank" class="fab fa-instagram"></a>
                            </li>
                        </ul>

                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5 -->
            <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                <div class="hover-team">
                    <div class="our-team">
                        <img src="{{ asset('assets_pengguna/images/team/saskia.jpeg') }}" alt="">
                        <div class="team-content">
                            <h3 class="title">Saskia S</h3>
                            <span class="post">Developer</span>
                        </div>

                        <ul class="social">
                            <li>
                                <a href="https://instagram.com/shofaaanw" target="_blank" class="fab fa-instagram"></a>
                            </li>
                        </ul>

                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
@endsection