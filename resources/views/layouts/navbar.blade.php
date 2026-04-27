<nav class="navbar navbar-expand-lg px-3 navbar-light bg-transparent shadow-none">
    
    <!-- Hamburger (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu kanan -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
        <ul class="navbar-nav">

            <!-- Dropdown icon -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-menu-button-wide fs-4"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profil.index') }}">
                            My Profile
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
