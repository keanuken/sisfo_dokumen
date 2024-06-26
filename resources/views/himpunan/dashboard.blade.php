@extends('himpunan.layouts.master')
@section('title', 'Dashboard Himpunan')

@include('himpunan.layouts.header')

@section('content')
    <section class="content-header">
        <?php $authController = new App\Http\Controllers\AuthController(); ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang <span
                            class="text-bold text-primary">{{ $authController->showUserName() }},</span><br>di dashboard
                        Himpunan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    $jumlahUser = \App\Models\User::where('roles', 'mahasiswa')->count();
    $himpunanDoc = \App\Models\document::select('sub.nama_subKategori', \DB::raw('count(*) as total'))
        ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
        ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
        ->where('kat.nama_kategori', ['himpunan'])
        ->groupBy('sub.nama_subKategori')
        ->get();
    $himpunan = \App\Models\document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
        ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
        ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
        ->where('kat.nama_kategori', ['himpunan'])
        ->count();
    $publik = \App\Models\document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
        ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
        ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
        ->where('kat.nama_kategori', ['himpunan'])
        ->where('table_document.status', 'publik')
        ->count();
    $private = \App\Models\document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
        ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
        ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
        ->where('kat.nama_kategori', ['himpunan'])
        ->where('table_document.status', 'private')
        ->count();
    
    // dd($private);
    
    ?>

    <section class="content mt-2">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-bold">Ringkasan Statistik Dokumen</h3>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
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
                                    @if ($himpunan > 0)
                                        <h3>{{ $himpunan }}</h3>
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Dokumen Berdasarkan Status Dokumen</h3>
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
                                    <canvas id="status"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Dokumen Berdasarkan Sub Kategori</h3>
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
                                    <canvas id="subKategoriChart"
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
            var ctx = document.getElementById('status').getContext('2d');
            var donutChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Dokumen Publik', 'Dokumen Private'],
                    datasets: [{
                        data: [{{ $publik }}, {{ $private }}],
                        backgroundColor: ['#03ebfc', '#5afc03'],
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
            var ctx = document.getElementById('subKategoriChart').getContext('2d');
            var subKategoriChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($himpunanDoc->pluck('nama_subKategori')) !!},
                    datasets: [{
                        data: {!! json_encode($himpunanDoc->pluck('total')) !!},
                        backgroundColor: ['#a903fc', '#fc039d', '#fcba03', '#fc03fc', '#03fcf8',
                            '#f803fc'
                        ],
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
