<!DOCTYPE html>
<html>

@section('title', 'Sub Kategori')
@include('component.header')

<style>
    .jumbotron .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(139, 139, 139, 0.3);
        /* Warna hitam dengan transparansi 50% */
        z-index: 1;
    }

    .jumbotron .container {
        z-index: 2;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{ url('/') }}" class="navbar-brand mx-5">
            <img class="group-2" width="auto" height="50" src="{{ asset('assets/group-3-2.png') }}" />
        </a>
        <button class="navbar-toggler ml-auto py-2 mt-4" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto w-75 d-flex justify-content-around">
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="#">Hubungi</a>
                </li>
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="{{ route('dokumen-publik') }}">Dokumen</a>
                </li>
                <li class="nav-item active text-bold mr-3">
                    <a href="{{ route('beranda.login') }}" class="btn text-white btn-warning d-md-flex flex-md-row"
                        type="button">
                        <span class="mr-2"><i class="fa fa-user"></i></span>
                        Login
                    </a>
                </li>
                <div class="dropdown">
                    <button class="btn text-white btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2"><i class="fa fa-tachometer-alt"></i></span>
                        Dashboard
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.login') }}">Dashboard Admin</a>
                        <a class="dropdown-item" href="{{ route('himpunan.loginHimpunan') }}">Dashboard Himpunan</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <section class="content">
        <div class="jumbotron position-relative"
            style="background: url({{ asset('assets/carousel.png') }}) no-repeat center center; background-size: cover; height: 40em;">
            <div class="overlay"></div>
            <div class="container text-white for-about d-flex flex-column align-items-center position-relative mt-5">
                <img src="{{ asset('assets/group-2.png') }}" height="auto" width="600px" alt="Deskripsi gambar"
                    class="img-fluid mb-3">
                <h1 class="mt-5">Selamat datang di website SIMADOK!</h1>
            </div>
        </div>

        <div class="container-fluid p-0 m-0 min-vh-100">
            <div class="row">
                <?php
                $ceksubKategori = $subKategori->count();
                ?>
                <div class="col-12">
                    <h1 class="text-center text-bold my-5">Sub Kategori Dokumen</h1>
                    {{-- card prodi --}}
                    @if ($ceksubKategori > 0)
                        <div class="d-flex flex-column flex-lg-row flex-wrap justify-content-around align-items-center">
                            @foreach ($subKategori as $sub)
                                <div class="card m-5" style="width: 18rem;">
                                    <div class="card-img-top bg-info d-flex justify-content-center align-items-center"
                                        style="height: 10em">
                                        <h1><i class="fa fa-file"></i></h1>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <h5 class="card-title text-bold text-center my-3">{{ $sub->nama_subKategori }}
                                        </h5>
                                        <a href="{{ route('sub-sub-kategori', $sub->id_subKategori) }}"
                                            class="btn btn-outline-primary">
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h1 class="text-center ml-5 my-5">Belum ada dokumen yang di unggah.</h1>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('component.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
