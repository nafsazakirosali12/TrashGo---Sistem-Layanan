<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets_admin/img/logo.png">
  <title>TrashGo!</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets_admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets_admin/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
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

<body>
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8 login-card">

                <!-- HEADER -->
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Create Account</h3>
                  <p class="mb-0">Enter your data to register</p>
                </div>

                <!-- FORM -->
                <div class="card-body">
                  <form method="POST" action="/register">
                    @csrf

                    {{-- ALERT --}}
                    @if ($errors->any())
                      <div class="alert alert-danger text-white">
                        <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                    @if(session('success'))
                      <div class="alert alert-success text-white">
                        {{ session('success') }}
                      </div>
                    @endif

                    <!-- NAMA -->
                    <label>Name</label>
                    <div class="mb-3">
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full Name">
                      @error('name')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- EMAIL -->
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- PASSWORD -->
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password (min 8 karakter)">
                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                        Sign up
                      </button>
                    </div>
                  </form>
                </div>

                <!-- FOOTER -->
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="/login" class="text-info text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="../assets_admin/js/core/bootstrap.min.js"></script>
</body>

</html>