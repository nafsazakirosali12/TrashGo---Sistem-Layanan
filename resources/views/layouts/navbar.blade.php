<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-3 border-radius-xl">
  <div class="container-fluid py-1 px-3">

    <!-- KIRI -->
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
          <li class="breadcrumb-item text-sm">Pages</li>
          <li class="breadcrumb-item text-sm text-dark active">
            @yield('page')
          </li>
        </ol>
      </nav>
      <h6 class="font-weight-bolder mb-0">@yield('page')</h6>
    </div>

    <!-- KANAN -->
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-menu-button-wide fs-4"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('admin.profil.index') }}">
                Profil Saya
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>