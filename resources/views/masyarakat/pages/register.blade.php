<!--
=========================================================
* Soft UI Dashboard - v1.0.3 
=========================================================
-->
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets_admin/img/logo.png">
  <title>TrashGo!</title>
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets_admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets_admin/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="../assets_admin/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

  <style>
    body { min-height: 100vh; display: flex; flex-direction: column; background-color: #f8f9fa; }
    .login-card { transition: all 0.25s ease-in-out; border-radius: 16px; border: 1px solid #eaeaea; }
    .login-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08); }
    .navbar-custom { background-color: #ffffff; border-bottom: 1px solid #eaeaea; padding: 15px 0; }
    .btn-outline-theme { border: 2px solid #b0b435; color: #b0b435; font-weight: 600; border-radius: 8px; padding: 8px 24px; transition: 0.3s; background: transparent; }
    .btn-outline-theme:hover { background-color: #b0b435; color: #ffffff; }
    .btn-theme { background-color: #b0b435; color: #ffffff; font-weight: 600; border-radius: 8px; padding: 8px 24px; transition: 0.3s; border: 2px solid #b0b435; }
    .btn-theme:hover { background-color: #989c1e; border-color: #989c1e; color: #ffffff; opacity: 0.9; }
    .footer-custom { background-color: #ffffff; border-top: 1px solid #eaeaea; padding: 60px 0 20px 0; margin-top: auto; }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar-custom w-100 position-relative z-index-3">
      <div class="container d-flex justify-content-between align-items-center">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('assets_admin/img/logo.png') }}" class="logo" alt="" style="max-width: 120px; height: auto;">
          </a>
          <div class="d-flex align-items-center">
              <a href="/login" class="btn btn-outline-theme mb-0 text-sm me-2">Masuk</a>
              <a href="/register" class="btn btn-theme mb-0 text-sm">Daftar</a>
          </div>
      </div>
  </nav>
  <!-- NAVBAR -->

  <main class="main-content mt-0 flex-grow-1 d-flex align-items-center py-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-8 d-flex flex-column mx-auto">
          <div class="card card-plain login-card bg-white shadow-sm">
            
            <div class="card-header pb-0 text-center bg-transparent mt-4 border-0">
              <h3 class="font-weight-bolder" style="color: #b0b435;">Buat Akun</h3>
              <p class="mb-0 text-muted" style="font-size: 14px;">Masukkan data Anda untuk mendaftar</p>
            </div>
            
            <div class="card-body">
              <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <label class="form-label font-weight-bold text-dark text-sm">Nama Lengkap</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control px-3 py-2" placeholder="Masukkan nama lengkap" style="border-radius: 8px;">
                </div>
                <div class="mb-3">
                  <label class="form-label font-weight-bold text-dark text-sm">Email</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control px-3 py-2" placeholder="Masukkan email" style="border-radius: 8px;">
                </div>
                <div class="mb-4">
                  <label class="form-label font-weight-bold text-dark text-sm">Kata Sandi</label>
                  <input type="password" name="password" class="form-control px-3 py-2" placeholder="Minimal 8 karakter" style="border-radius: 8px;">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn w-100 mb-0 btn-theme" style="border-radius: 8px; padding: 12px 0;">
                    Daftar Sekarang
                  </button>
                </div>
              </form>
            </div>

            <div class="card-footer text-center pt-0 px-lg-2 px-1 border-0 bg-transparent mb-3">
              <p class="mb-0 text-sm mx-auto">
                Sudah punya akun?
                <a href="/login" class="font-weight-bolder" style="color: #b0b435;">Masuk</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer-custom mt-auto">
      <div class="container">
          <div class="row justify-content-center mb-4 text-center">
              <div class="col-lg-4 col-md-6 mb-4">
                  <h5 class="font-weight-bolder mb-3" style="color: #67748e;">TrashGo!</h5>
                  <p style="color: #67748e;">Platform layanan pengangkutan sampah digital untuk masyarakat.</p>
                  <p style="color: #67748e;">Nagri Kaler, Purwakarta</p>
                  <div class="d-flex justify-content-center gap-3">
                      <a href="#" style="color: #67748e; font-size: 18px;"><i class="fab fa-instagram"></i></a>
                      <a href="#" style="color: #67748e; font-size: 18px;"><i class="fab fa-youtube"></i></a>
                      <a href="#" style="color: #67748e; font-size: 18px;"><i class="fab fa-twitter"></i></a>
                      <a href="#" style="color: #67748e; font-size: 18px;"><i class="fab fa-facebook"></i></a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-12 mb-4">
                  <h6 class="font-weight-bold mb-3" style="color: #344767;">Layanan Kami</h6>
                  <ul class="nav flex-column align-items-center">
                      <li class="nav-item mb-2"><a href="/about_us" style="color: #67748e; text-decoration: none;">Tentang Kami</a></li>
                      <li class="nav-item mb-2"><a href="/" style="color: #67748e; text-decoration: none;">Kategori Layanan</a></li>
                      <li class="nav-item mb-2"><a href="/point" style="color: #67748e; text-decoration: none;">Tukar Poin</a></li>
                  </ul>
              </div>
              <div class="col-lg-3 col-md-3 col-12 mb-4">
                  <h6 class="font-weight-bold mb-3" style="color: #344767;">Bantuan</h6>
                  <ul class="nav flex-column align-items-center">
                      <li class="nav-item mb-2"><a href="/" style="color: #67748e; text-decoration: none;">Tanya Jawab (FAQ)</a></li>
                      <li class="nav-item mb-2"><a href="/" style="color: #67748e; text-decoration: none;">Kebijakan Privasi</a></li>
                  </ul>
              </div>
          </div>
          <hr style="border-top: 1px solid #eaeaea; margin: 0 0 20px 0;">
          <div class="row align-items-center">
              <div class="col-12 text-center">
                  <div class="text-center text-sm text-muted">
                      © {{ date('Y') }}, Dibuat oleh <span class="fw-bold">Tim RecyCode</span> untuk lingkungan yang lebih baik.
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <script src="../assets_admin/js/core/popper.min.js"></script>
  <script src="../assets_admin/js/core/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          @if($errors->any())
              Swal.fire({ 
                icon: 'error', 
                title: 'Gagal Mendaftar!', 
                html: '<ul style="text-align: left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>', 
                confirmButtonColor: '#b0b435' 
              });
          @endif

          @if(session('success'))
              Swal.fire({ icon: 'success', title: 'Berhasil!', text: '{{ session('success') }}', confirmButtonColor: '#b0b435' });
          @endif
      });
  </script>
</body>
</html>