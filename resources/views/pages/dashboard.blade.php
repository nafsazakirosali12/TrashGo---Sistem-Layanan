@extends('layouts.app')

@section('page', 'Dashboard')

@section('content')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pembayaran</p>
                    <h5 class="font-weight-bolder mb-0">
                      Rp {{ number_format($total_pembayaran, 0, ',', '.') }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Order</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $total_order }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Petugas</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $total_petugas }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kategori</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $total_kategori }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-7">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-4 pt-2">Visi TrashGo!</h5>
                    <p class="mb-0 text-sm text-justify">
                      TrashGo! adalah produk di segmen layanan lingkungan berbasis digital
                      yang memberikan manfaat dalam mempermudah pengelolaan sampah secara
                      terorganisir dan efisien bagi masyarakat yang mengalami masalah
                      penumpukan sampah serta kurangnya sistem pengelolaan yang terjadwal.
                    </p>

                    <p class="mt-3 mb-0 text-sm text-justify">
                      Berbeda dengan produk kompetitor, TrashGo! menawarkan sistem
                      terintegrasi dengan fitur klasifikasi sampah, penjadwalan fleksibel,
                      serta reward poin untuk meningkatkan partisipasi pengguna dalam
                      menjaga kebersihan lingkungan dan menciptakan kota yang lebih sehat.
                    </p>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="../assets_admin/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="../assets_admin/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3 bg-gradient-primary">
            <div class="overflow-hidden position-relative border-radius-lg h-100">
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-2">
                <h5 class="text-white font-weight-bolder mb-2 pt-2">Misi TrashGo!</h5>
                <ul class="text-white text-sm ps-3 mb-0" style="line-height:1.8;">
                  <li>Memiliki 150 pengguna yang terdaftar dalam kurun waktu 3 bulan.</li>
                  <li>Meningkatkan jumlah pengangkutan sampah melalui platform TrashGo!</li>
                  <li>Meningkatkan partisipasi masyarakat dalam klasifikasi sampah melalui platform TrashGo!</li>
                  <li>Memungkinkan pengguna menentukan jadwal pengambilan sampah secara fleksibel sesuai kebutuhan melalui platform TrashGo!</li>
                  <li>Mendorong partisipasi aktif masyarakat melalui pemberian reward poin sebagai bentuk apresiasi atas pengelolaan sampah.</li>
                </ul>
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
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

@endsection