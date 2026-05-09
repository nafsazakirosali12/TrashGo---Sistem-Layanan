<footer class="bg-dark text-white">
    <div class="footer-main  pt-5 pb-2">
        <div class="container">
            <!-- ROW 1 -->
            <div class="row text-center">
                <!-- Business Time -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <h4 class="fw-bold text-white border-bottom border-warning pb-2 d-inline-block mb-3">
                        Jam Operasional
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">Setiap Hari</li>
                        <li>10.00 - 17.00</li>
                    </ul>
                </div>
                <!-- Media Sosial -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <h4 class="fw-bold text-white border-bottom border-warning pb-2 d-inline-block mb-3">
                        Sosial Media
                    </h4>
                    <p class="mb-2">Ikuti Kami</p>
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <a href="#" class="text-white d-flex align-items-center ml-2">
                            <p><i class="fab fa-facebook"></i> Recycode</p>
                        </a>
                        <a href="#" class="text-white d-flex align-items-center ml-2">
                            <p><i class="fab fa-twitter"></i> Recycode</p>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <!-- ROW 2 -->
            <div class="row text-center">
                <!-- Information -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <h4 class="fw-bold text-white border-bottom border-warning pb-2 d-inline-block mb-3">
                        Informasi
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('masyarakat.pages.home_masyarakat') }}" class="text-white text-decoration-none">Beranda</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('masyarakat.pages.about_us') }}" class="text-white text-decoration-none">Tentang Kami</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('masyarakat.pages.order') }}" class="text-white text-decoration-none">Pesan</a>
                        </li>
                    </ul>
                </div>
                <!-- Contact Us -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <h4 class="fw-bold text-white border-bottom border-warning pb-2 d-inline-block mb-3">
                        Kontak Kami
                    </h4>
                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Nagri Kaler, Purwakarta
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:+6289501112345" class="text-white text-decoration-none">
                                +62 895 0111 2345
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:recycode@gmail.com" class="text-white text-decoration-none">
                                recycode@gmail.com
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <hr class="border-light">
            <!-- COPYRIGHT -->
            <div class="text-center text-sm text-muted">
                © {{ date('Y') }},
                Dibuat dengan <i class="fa fa-heart"></i> oleh
                <span class="fw-bold">Tim RecyCode</span>
                untuk lingkungan yang lebih baik.
            </div>
        </div>
    </div>
</footer>