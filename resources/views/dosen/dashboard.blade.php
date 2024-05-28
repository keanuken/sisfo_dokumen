@extends('dosen.layouts.master')
@section('title', 'Dashboard dosen')

@include('dosen.layouts.header')

@include('dosen.layouts.sidebar')

@section('content')
    <section class="content-header">
        <?php $authController = new App\Http\Controllers\AuthController(); ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $authController->showUserName() }}</h1>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <h5>Surat Masuk</h5>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Surat Masuk></span>
                                <span class="info-box-number">6666</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <h5>Surat Masuk</h5>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Lorem, ipsum dolor.</lorem:3></span>
                                <span class="info-box-number">6666</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <h5>Surat Masuk</h5>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Lorem, ipsum dolor.</lorem:3></span>
                                <span class="info-box-number">6666</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <h5>Surat Masuk</h5>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Lorem, ipsum dolor.</lorem:3></span>
                                <span class="info-box-number">6666</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
