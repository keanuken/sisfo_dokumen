@extends('himpunan.layouts.master')
@section('title', 'Dokumen Himpunan')

@include('himpunan.layouts.header')

@section('style')
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
    </style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Dokumen Himpunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('himpunan.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Dokumen Himpunan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content-body px-3">
        <div class="card card-primary">
            <div class="card-header mb-3">
                <h3 class="card-title">Data Dokumen</h3>
            </div>
            <!-- /.card-header -->
            <table id="example" class="table table-responsive table-striped bg-info" style="width:100%">
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
                        <th class="text-center">Tombol Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($document as $doc)
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center">{{ $doc->nama_dokumen }}</td>
                            <td class="text-center">{{ $doc->judul_dokumen }}</td>
                            <td class="text-center">{{ $doc->nama_kategori }}</td>
                            <td class="text-center">{{ $doc->nama_subKategori }}</td>
                            <td class="text-center">Versi {{ $doc->versi_dokumen }}</td>
                            <td class="text-center">{{ $doc->status }}</td>
                            <td class="text-center">
                                <a href="https://{{ $doc->tautan_dokumen }}" target="_blank" class="btn btn-warning">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                            </td>
                            <td class="d-flex flex-col justify-content-between">
                                <a href="{{ route('himpunan.dokumen.edit', $doc->id_dokumen) }}" class="btn btn-warning">
                                    <i class="fas fa-pen text-white"></i>
                                </a>
                                <a href="#" class="btn btn-warning">
                                    <i class="fas fa-trash text-white"></i>
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
                        <th class="text-center">Tombol Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

@section('script')
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "dom": '<"top"f>rt<"bottom"lp><"clear">',
                "language": {
                    "search": "Cari:"
                }
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

@endsection
