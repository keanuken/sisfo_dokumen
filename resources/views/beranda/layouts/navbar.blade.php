<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{ url('/beranda') }}" class="navbar-brand mx-5">
        <img class="group-2" width="auto" height="50" src="{{ asset('assets/group-3-2.png') }}" />
    </a>
    <button class="navbar-toggler ml-auto py-2 mt-4" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto w-50 d-flex justify-content-around">
            <li class="nav-item active text-bold">
                <a class="nav-link" href="{{ url('/beranda') }}">Beranda</a>
            </li>
            <li class="nav-item active text-bold">
                <a class="nav-link" href="#">Hubungi</a>
            </li>
            <div class="dropdown">
                <button class="btn text-white btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2"><i class="fa fa-file"></i></span>
                    Dokumen
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('beranda.docPrivate') }}">Dokumen Private</a>
                    <a class="dropdown-item" href="{{ route('beranda.docPublik') }}">Dokumen Publik</a>
                </div>
            </div>
            {{-- <div class="dropdown">
                <button class="btn text-white btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2"><i class="fa fa-tachometer-alt"></i></span>
                    Dashboard
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('admin.login') }}">Dashboard Admin</a>
                    <a class="dropdown-item" href="{{ route('himpunan.loginHimpunan') }}">Dashboard Himpunan</a>
                </div>
            </div> --}}
            <li class="nav-item active text-bold">
                <a href="{{ route('beranda.logoutBeranda') }}" class="btn text-white btn-danger" type="button">
                    <span class="mr-2"><i class="fa fa-user"></i></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
