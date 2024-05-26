<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('himpunan.dashboard') }}" class="brand-link">
        <div class="text-center">
            <img src="{{ asset('logo-kecil.png') }}" alt="Simadok Logo" class="brand-image">
            <span class="brand-text font-weight-bold">SIMADOK</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline pt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex flex-col align-items-center">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Dokumen</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-col align-items-center">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Tambah Dokumen
                                </p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('himpunan.dokumen-himpunan') }}"
                                        class="nav-link d-flex flex-col align-items-center">
                                        <i class="nav-icon fas fa-flag"></i>
                                        <p>Himpunan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-col align-items-center">
                                <i class="nav-icon fa fa-circle"></i>
                                <p>Kelola Dokumen</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('himpunan.dokumen.himpunan') }}"
                                        class="nav-link d-flex flex-col align-items-center">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Dokumen Himpunan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <!-- Logout Button -->
    <div class="sidebar-bottom p-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
        <ul class="nav flex-column">
            <li class="nav-item bg-danger rounded">
                <a class="nav-link" href="{{ route('himpunan.logoutHimpunan') }}"
                    style="display: flex; justify-content: space-between; align-items: center; margin:3px 0 3px 0;">
                    <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="nav-text">Logout</span>
                    @csrf
                </a>
            </li>
        </ul>
    </div>
</aside>
