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
    @include('beranda.layouts.navbar')

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
                                        <a href="{{ route('beranda.sub-sub-kategori', $sub->id_subKategori) }}"
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
