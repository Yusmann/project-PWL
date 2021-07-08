<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/beranda') }}" class="brand-link">
        <img src="{{ asset('images/Logo P.png') }}" type="image/svg" alt="Logo P" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Passion IT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

<!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/beranda') }}" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">
                        <i class="fas fa-question-circle nav-icon"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database nav-icon"></i>
                        <p>
                            Menu Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>
                                    Pengguna
                                <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/pengguna') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pengguna</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('penggunapdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Download PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-graduation-cap nav-icon"></i>
                                <p>Guru
                                <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/guru') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('gurupdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Download PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Kelas</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/kelas') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('kelaspdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Download PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>