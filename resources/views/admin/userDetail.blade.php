@extends('admin.layouts.master')
@section('title', 'Dokumen Prodi')

@include('admin.layouts.header')

@section('style')
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: left;
            text-align: left;
        }

        label {
            margin: 1em 0 2em 1em;
        }

        input.form-control {
            padding: 0 1.5em 0 1.5em;
        }
    </style>
@endsection

@include('admin.layouts.sidebar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>List Informasi Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">List Informasi Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content-body px-3">
        <div class="card card-primary">
            <div class="card-header mb-3">
                <h3 class="card-title">Informasi Akun</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-success my-2 text-bold">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger my-2 text-bold">
                    {{ session('error') }}
                </div>
            @endif
            <!-- /.card-header -->
            <div class="table-responsive">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Akun</th>
                            <th class="text-center">Email Akun</th>
                            <th class="text-center">Roles Akun</th>
                            <th class="text-center">Tanggal Dibuat</th>
                            <th class="text-center">Terakhir Diperbarui</th>
                            <th class="text-center">Tombol Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $us)
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center text-uppercase">{{ $us->name }}</td>
                                <td class="text-center text-uppercase">{{ $us->email }}</td>
                                <td class="text-center text-uppercase">{{ $us->roles }}</td>
                                <td class="text-center text-uppercase">{{ $us->tanggal }}</td>
                                <td class="text-center text-uppercase">{{ $us->tanggalUpdate }}</td>
                                <form action="{{ route('admin.deleteUser', $us->id) }}" method="post">
                                    <td class="text-center">
                                        <a href="{{ route('admin.editUser', $us->id) }}" class="btn btn-warning">
                                            <i class="fas fa-pen text-white"></i>
                                        </a>

                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('Apakah anda yakin menghapus User {{ $us->name }}?')"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash text-white"></i>
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama User</th>
                            <th class="text-center">Email User</th>
                            <th class="text-center">Roles User</th>
                            <th class="text-center">Tanggal Dibuat</th>
                            <th class="text-center">Terakhir Diperbarui</th>
                            <th class="text-center">Tombol Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
                "autoWidth": true,
                "dom": '<"top"f>rt<"bottom"lp><"clear">',
                "language": {
                    "search": "Cari:"
                }
            });
        });
    </script>
@endsection

@endsection
