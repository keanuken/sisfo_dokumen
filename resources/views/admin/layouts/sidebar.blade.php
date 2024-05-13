<aside class="main-sidebar sidebar-white-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.') }}" class="brand-link">
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
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Dokumen
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    {{-- root --}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Akreditasi</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visi Misi</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Standar</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Surat Keterangan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tata Panca</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Akreditasi</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visi Misi</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Standar</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Surat Keterangan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tata Panca</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Akreditasi</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visi Misi</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Standar</p>
                                                </a>
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Surat Keterangan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tata Panca</p>
                                        <i class="fas fa-angle-left right"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <div class="border-top border-bottom">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-circle nav-icon"></i>
                                                    <p>Kebijakan</p>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Kelola Akun
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Lihat Akun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tambah-user') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Tambah Akun</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
