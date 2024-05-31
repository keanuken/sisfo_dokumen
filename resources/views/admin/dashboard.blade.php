@extends('admin.layouts.master')
@section('title', 'Dashboard')

@include('admin.layouts.header')

@include('admin.layouts.sidebar')

@section('content')
    <section class="content-header">
        <?php $authController = new App\Http\Controllers\AuthController(); ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang <span
                            class="text-bold text-primary">{{ $authController->showUserName() }},</span><br>di dashboard
                        Admin</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    $jumlahUser = \App\Models\User::count(); // Misalnya menjumlahkan semua ID user
    $jumlahDocument = \App\Models\document::count(); // Misalnya menjumlahkan semua ID document
    $publik = \App\Models\document::where('status', 'publik')->count();
    $private = \App\Models\document::where('status', 'private')->count();
    $prodi = \App\Models\document::select('table_document.*', 'sub.*', 'kat.nama_kategori')->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')->where('kat.id_kategori', 2)->count();
    $himpunan = \App\Models\document::select('table_document.*', 'sub.*', 'kat.nama_kategori')->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')->where('kat.id_kategori', 1)->count();
    ?>

    <section class="content mt-2 w-auto">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-bold">Ringkasan Statistik Dokumen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <h5>Jumlah Akun Terdaftar</h5>
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    @if ($jumlahUser > 0)
                                        <h3>{{ $jumlahUser }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif

                                    <p>Akun Terdaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h5>Total Dokumen Arsip</h5>
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    @if ($jumlahDocument > 0)
                                        <h3>{{ $jumlahDocument }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif

                                    <p>Dokumen Arsip</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-email"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h5>Jumlah Administrator Terdaftar</h5>
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $jumlahAdministrator = \App\Models\User::where('roles', 'administrator')->count();
                                    ?>
                                    @if ($jumlahAdministrator > 0)
                                        <h3>{{ $jumlahAdministrator }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif
                                    <p>Administrator Terdaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Status Dokumen</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="donutChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Kategori Dokumen</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="dokumenKategori"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('donutChart').getContext('2d');
            var donutChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Dokumen Publik', 'Dokumen Private'],
                    datasets: [{
                        data: [{{ $publik }}, {{ $private }}],
                        backgroundColor: ['#fcba03', '#5afc03'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('dokumenKategori').getContext('2d');
            var donutChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Dokumen Prodi', 'Dokumen Himpunan'],
                    datasets: [{
                        data: [{{ $prodi }}, {{ $himpunan }}],
                        backgroundColor: ['#8c03fc', '#fc8403'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
@endsection

@endsection
