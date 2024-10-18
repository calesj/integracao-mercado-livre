<aside class="app-sidebar bg-dark-subtle" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
            <img src="{{ asset('assets/logo/destak-logo.jpg') }}" alt="logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Destak</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item"><a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Produtos
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Todos os Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Publicar Produto</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">
                            <i class="bi bi-box-arrow-left"></i>
                            <p>Sair</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
