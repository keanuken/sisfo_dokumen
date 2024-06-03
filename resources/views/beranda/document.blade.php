<!DOCTYPE html>
<html lang="en">

@section('title', 'Dokumen Private')
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
    @include('beranda.layouts.navbar')

    <section class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Dokumen Private</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('beranda.') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Dokumen Private</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="card card-primary">
            <div class="card-header mb-3">
                <h3 class="card-title">Data Dokumen</h3>
            </div>
            <!-- /.card-header -->
            <table id="example" class="table table-responsive table-striped my-4" style="width:100%">
                <thead>
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
                </thead>
                <tbody>
                    @foreach ($document as $doc)
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center text-uppercase">{{ $doc->nama_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->judul_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->nama_kategori }}</td>
                            <td class="text-center text-uppercase">{{ $doc->nama_subKategori }}</td>
                            <td class="text-center text-uppercase">Versi {{ $doc->versi_dokumen }}</td>
                            <td class="text-center text-uppercase">{{ $doc->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('beranda.docDetail', $doc->id_dokumen) }}" class="btn btn-warning">
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
