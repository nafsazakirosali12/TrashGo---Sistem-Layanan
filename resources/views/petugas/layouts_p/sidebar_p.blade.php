
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="{{ asset('assets_admin/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">TrashGo!</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>kantor</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dasbor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('daftar-pesanan*') ? 'active' : '' }}" href="{{ route('daftar-pesanan') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg style="width: 20px !important; height: 20px !important; transform: scale(1.15);" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>Daftar Pesanan</title>
                <path class="color-background opacity-6" d="M9 2H15C15.55 2 16 2.45 16 3V4H18C19.1 4 20 4.9 20 6V20C20 21.1 19.1 22 18 22H6C4.9 22 4 21.1 4 20V6C4 4.9 4.9 4 6 4H8V3C8 2.45 8.45 2 9 2Z"></path>
                <path class="color-background" d="M9 4V5C9 5.55 9.45 6 10 6H14C14.55 6 15 5.55 15 5V4H9ZM8 10H16V12H8V10ZM8 14H16V16H8V14ZM8 18H13V20H8V18Z"></path>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Daftar Pesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('pengangkutan*') ? 'active' : '' }}" href="{{ route('pengangkutan') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg style="width: 20px !important; height: 20px !important; transform: scale(1.15);" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>Pengangkutan</title>
                <path class="color-background opacity-6" d="M3 5C3 4.45 3.45 4 4 4H15C15.55 4 16 4.45 16 5V8H18.5C18.82 8 19.12 8.15 19.31 8.41L22 12V17C22 17.55 21.55 18 21 18H19C18.74 16.86 17.72 16 16.5 16C15.28 16 14.26 16.86 14 18H10C9.74 16.86 8.72 16 7.5 16C6.28 16 5.26 16.86 5 18H4C3.45 18 3 17.55 3 17V5Z"></path>
                <path class="color-background" d="M16 10V13H20L18.5 10H16ZM7.5 17C8.33 17 9 17.67 9 18.5C9 19.33 8.33 20 7.5 20C6.67 20 6 19.33 6 18.5C6 17.67 6.67 17 7.5 17ZM16.5 17C17.33 17 18 17.67 18 18.5C18 19.33 17.33 20 16.5 20C15.67 20 15 19.33 15 18.5C15 17.67 15.67 17 16.5 17ZM5 7H14V9H5V7ZM5 10H12V12H5V10Z"></path>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Pengangkutan</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('petugas.riwayat_pengangkutan*') ? 'active' : '' }}" href="{{ route('petugas.riwayat_pengangkutan') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg style="width: 20px !important; height: 20px !important; transform: scale(1.15);" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <title>Riwayat Pengangkutan</title>
                        <path class="color-background opacity-6" d="M3 5C3 4.45 3.45 4 4 4H15C15.55 4 16 4.45 16 5V8H18.5C18.82 8 19.12 8.15 19.31 8.41L22 12V17C22 17.55 21.55 18 21 18H19C18.74 16.86 17.72 16 16.5 16C15.28 16 14.26 16.86 14 18H10C9.74 16.86 8.72 16 7.5 16C6.28 16 5.26 16.86 5 18H4C3.45 18 3 17.55 3 17V5Z"></path>
                        <path class="color-background" d="M16 10V13H20L18.5 10H16ZM7.5 17C8.33 17 9 17.67 9 18.5C9 19.33 8.33 20 7.5 20C6.67 20 6 19.33 6 18.5C6 17.67 6.67 17 7.5 17ZM16.5 17C17.33 17 18 17.67 18 18.5C18 19.33 17.33 20 16.5 20C15.67 20 15 19.33 15 18.5C15 17.67 15.67 17 16.5 17ZM5 7H14V9H5V7ZM5 10H12V12H5V10Z"></path>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Riwayat Pengangkutan</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('pendapatan*') ? 'active' : '' }}" href="{{ route('pendapatan') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>box-3d-50</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(603.000000, 0.000000)">
                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Pendapatan</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>