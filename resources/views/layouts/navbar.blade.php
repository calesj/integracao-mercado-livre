<nav class="app-header navbar navbar-expand bg-dark" data-bs-theme="dark">
    <div class="container-fluid">

        <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ $user->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-footer">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-default btn-flat">Dashboard</a>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Sair</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
