<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets_admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets_admin/img/logo.png">
  <title>
    TrashGo!
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets_admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets_admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets_admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets_admin/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

  <style>
    .login-card {
        transition: all 0.25s ease-in-out;
        border-radius: 20px;
    }

    .login-card:hover {
        transform: translateY(-10px) scale(1.01);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.18);
    }
   </style>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8 login-card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="/admin/login">
                    @csrf

                    {{-- ALERT --}}
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger text-white">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                      @error('email')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="/register" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets_admin/js/core/popper.min.js"></script>
  <script src="../assets_admin/js/core/bootstrap.min.js"></script>
  <script src="../assets_admin/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets_admin/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets_admin/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>