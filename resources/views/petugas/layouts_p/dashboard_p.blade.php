@extends('petugas.layouts_p.app_p')

@section('page', 'Dasbor')

@section('content')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pendapatan</p>
                    <h5 class="font-weight-bolder mb-0">
                        Rp {{ number_format($total_pendapatan, 0, ',', '.') }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengangkutan Selesai</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{ $pickup_completed }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengangkutan Diproses</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{ $pickup_processing }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengangkutan Hari Ini</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{ $pickup_today }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">

    <!-- CARD INFORMASI -->
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">

                <!-- HEADER -->
                <div class="d-flex align-items-center mb-4">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle me-3">
                        <i class="fas fa-truck text-white opacity-10"></i>
                    </div>

                    <div>
                        <h5 class="mb-1 fw-bold">
                            Informasi Pengangkutan
                        </h5>

                        <p class="text-sm text-muted mb-0">
                            Dasbor aktivitas petugas TrashGo
                        </p>
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="bg-light border-radius-lg p-4 mb-4">
                    <p class="text-sm text-dark mb-0" style="line-height: 1.9;">
                        Selamat datang di dasbor petugas TrashGo.
                        Halaman ini digunakan untuk memantau aktivitas
                        pengangkutan sampah, status pengangkutan, pendapatan,
                        dan proses pelayanan yang sedang berjalan.
                        Pastikan setiap pengangkutan dilakukan tepat waktu
                        agar pelayanan kepada masyarakat tetap optimal.
                    </p>
                </div>

                <!-- FITUR -->
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center rounded-circle">
                                    <i class="fas fa-route text-white opacity-10"></i>
                                </div>
                            </div>

                            <div>
                                <h6 class="text-sm fw-bold mb-1">
                                    Monitoring pengangkutan
                                </h6>

                                <p class="text-xs text-muted mb-0">
                                    Memantau status pengangkutan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center rounded-circle">
                                    <i class="fas fa-wallet text-white opacity-10"></i>
                                </div>
                            </div>

                            <div>
                                <h6 class="text-sm fw-bold mb-1">
                                    Pendapatan
                                </h6>

                                <p class="text-xs text-muted mb-0">
                                    Melihat total pendapatan pengangkutan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center rounded-circle">
                                    <i class="fas fa-clock text-white opacity-10"></i>
                                </div>
                            </div>

                            <div>
                                <h6 class="text-sm fw-bold mb-1">
                                    Ketepatan Waktu
                                </h6>

                                <p class="text-xs text-muted mb-0">
                                    Memastikan pengangkutan dilakukan tepat waktu.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center rounded-circle">
                                    <i class="fas fa-shield-alt text-white opacity-10"></i>
                                </div>
                            </div>

                            <div>
                                <h6 class="text-sm fw-bold mb-1">
                                    Pelayanan Aman
                                </h6>

                                <p class="text-xs text-muted mb-0">
                                    Menjaga pengangkutan tetap aman dan tertib.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- CARD TUGAS -->
    <div class="col-lg-5">
        <div class="card h-100 border-0 shadow-sm bg-gradient-primary">
            <div class="card-body p-4 d-flex flex-column">

                <!-- HEADER -->
                <div class="d-flex align-items-center mb-4">
                    <div class="icon icon-shape bg-white shadow text-center rounded-circle me-3">
                        <i class="fas fa-clipboard-check text-primary"></i>
                    </div>

                    <div>
                        <h5 class="text-white fw-bold mb-1">
                            Tugas Petugas
                        </h5>

                        <p class="text-white text-sm mb-0 opacity-8">
                            Standar operasional pengangkutan
                        </p>
                    </div>
                </div>

                <!-- LIST -->
                <div class="bg-white border-radius-lg p-4 flex-grow-1">

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <span class="badge bg-gradient-primary rounded-circle p-2">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>

                        <div>
                            <p class="text-dark text-sm mb-0">
                                Melakukan pengangkutan sampah sesuai jadwal pengangkutan.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <span class="badge bg-gradient-primary rounded-circle p-2">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>

                        <div>
                            <p class="text-dark text-sm mb-0">
                                Memastikan status pengangkutan diperbarui secara berkala.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <span class="badge bg-gradient-primary rounded-circle p-2">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>

                        <div>
                            <p class="text-dark text-sm mb-0">
                                Menjaga kebersihan dan ketepatan waktu pelayanan.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="me-3">
                            <span class="badge bg-gradient-primary rounded-circle p-2">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>

                        <div>
                            <p class="text-dark text-sm mb-0">
                                Mengelola pengangkutan dengan aman dan tertib.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <span class="badge bg-gradient-primary rounded-circle p-2">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>

                        <div>
                            <p class="text-dark text-sm mb-0">
                                Memberikan pelayanan terbaik kepada masyarakat.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
      <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <div class="border-radius-lg py-3 pe-1 mb-3">
                <div>
                  <img src="assets_admin/img/LOGO.png" id="chart-bars" style="height:170px; object-fit:cover; width:100%;"></canvas>
                </div>
              </div>
              <h6 class="ms-2 mt-4 mb-0">Tim Pengembang</h6>
              <p class="text-sm ms-2"><span class="font-weight-bolder">RecyCode Team</span></p>
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-12 py-2">
                    <div class="d-flex align-items-center">
                      <div class="me-3">
                        <img src="assets_admin/img/team/nafsa.jpeg" class="rounded-3 shadow" style="width:45px; height:45px; object-fit:cover;">
                      </div>
                      <div>
                        <p class="text-xs mb-0 text-muted">Product Owner</p>
                        <h6 class="mb-0">Nafsa Zaki Rosali</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 py-2">
                    <div class="d-flex align-items-center">
                      <div class="me-3">
                        <img src="assets_admin/img/team/rizka.jpeg" class="rounded-3 shadow" style="width:45px; height:45px; object-fit:cover;">
                      </div>
                      <div>
                        <p class="text-xs mb-0 text-muted">Scrum Master</p>
                        <h6 class="mb-0">Rizkania Hartika Putri</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 py-2">
                    <div class="d-flex align-items-center">
                      <div class="me-3">
                        <img src="assets_admin/img/team/nanda.jpeg" class="rounded-3 shadow" style="width:45px; height:45px; object-fit:cover;">
                      </div>
                      <div>
                        <p class="text-xs mb-0 text-muted">Developer 1</p>
                        <h6 class="mb-0">Ananda Aulia Fauziah</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 py-2">
                    <div class="d-flex align-items-center">
                      <div class="me-3">
                        <img src="assets_admin/img/team/citra.jpeg" class="rounded-3 shadow" style="width:45px; height:45px; object-fit:cover;">
                      </div>
                      <div>
                        <p class="text-xs mb-0 text-muted">Developer 2</p>
                        <h6 class="mb-0">Citra Sya'bani Agustin</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 py-2">
                    <div class="d-flex align-items-center">
                      <div class="me-3">
                        <img src="assets_admin/img/team/saskia.jpeg" class="rounded-3 shadow" style="width:45px; height:45px; object-fit:cover;">
                      </div>
                      <div>
                        <p class="text-xs mb-0 text-muted">Developer 3</p>
                        <h6 class="mb-0">Saskia Shofawatunnisa</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>Lokasi Kantor TrashGo!</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">Sistem Layanan Manajemen Sampah</span>
              </p>
            </div>
            <div class="card-body p-3">
              <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13728.929806857888!2d107.42582873598155!3d-6.541704445124297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e68793165d3%3A0xffa2a8e015e0f877!2sGg.%20Mawar%2C%20Nagri%20Kaler%2C%20Kec.%20Purwakarta%2C%20Kabupaten%20Purwakarta%2C%20Jawa%20Barat%2041115!5e1!3m2!1sid!2sid!4v1777186082860!5m2!1sid!2sid" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>

  <!--   Core JS Files   -->
  <!-- <script src="../assets_admin/js/core/popper.min.js"></script>
  <script src="../assets_admin/js/core/bootstrap.min.js"></script> -->
  <script src="../assets_admin/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets_admin/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets_admin/js/plugins/chartjs.min.js"></script>
  <script>\
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

@endsection