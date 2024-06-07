<!DOCTYPE html>
<html lang="en">

@section('title', 'Dokumen Publik')
@include('beranda.layouts.header')

<style>
    .dataTables_wrapper .dataTables_filter {
        float: left;
        /* Ubah posisi ke kiri */
        text-align: left;
        /* Ubah teks ke kiri */
    }

    label {
        margin: 1em 0 2em 1em;
    }

    input.form-control {
        padding: 0 1.5em 0 1.5em;
    }

    ul.pagination {
        padding: 0 0 1.5em 1.5em;
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
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="#">Hubungi</a>
                </li>
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="{{ route('dokumen-publik') }}">Dokumen</a>
                </li>
                <li class="nav-item active text-bold">
                    <a href="{{ route('beranda.login') }}" class="btn text-white btn-warning" type="button">
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

    <section class="container mt-5">
        <div class="card card-primary">
            <div class="card-header mb-3">
                <h3 class="card-title">Data Dokumen</h3>
            </div>
            <!-- /.card-header -->
            <table id="example" class="table table-responsive table-striped my-4" style="width:100%">
                <thead>
                    <tr>
                        <th class="åtext-center">No</th>
                        <th class="text-center">Nama Dokumen</th>
                        <th class="text-center">Judul Dokumen</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Nama Sub Kategori</th>
                        <th class="text-center">Versi Dokumen</th>
                        <th class="text-center">Status Dokumen</th>
                        <th class="text-center">Lihat Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentPublik as $doc)
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center text-uppercase">{{ $doc->nama_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->judul_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->nama_kategori }}</td>
                            <td class="text-center text-uppercase">{{ $doc->nama_subKategori }}</td>
                            <td class="text-center text-uppercase">Versi {{ $doc->versi_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('docDetail', $doc->id_dokumen) }}" class="btn btn-warning">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Dokumen</th>
                        <th class="text-center">Judul Dokumen</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Nama Sub Kategori</th>
                        <th class="text-center">Versi Dokumen</th>
                        <th class="text-center">Status Dokumen</th>
                        <th class="text-center">Lihat Dokumen</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    @include('beranda.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthChange": false,
                "dom": '<"top"f>rt<"bottom"lp><"clear">',
                "language": {
                    "search": "Cari:"
                }
            });
        });
    </script>
</body>

</html>
