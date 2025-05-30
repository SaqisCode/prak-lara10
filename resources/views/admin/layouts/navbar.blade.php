<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a href="{{ route('dashboard.index') }}" class="navbar-brand ps-3 d-flex align-items-center px-4 py-3 text-blue-100 hover:bg-blue-700 hover:bg-opacity-30 hover:border-l-4 hover:border-white">Dashboard</a>

    <ul class="navbar-nav ms-auto d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
