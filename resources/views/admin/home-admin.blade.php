@extends('admin.layouts.master')
@section('title', 'Dashboard')

@include('admin.layouts.header')

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.home') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <div class="text-center">
            <img src="{{ asset('logo-kecil.png') }}" alt="Simadok Logo" class="brand-image">
            <span class="brand-text font-weight-bold">SIMADOK</span>
        </div>
    </a>

    <!-- Logout Button -->
    <div class="sidebar-bottom p-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
        <ul class="nav flex-column">
            <li class="nav-item bg-primary rounded">
                <a class="nav-link" href="{{ route('admin.login') }}"
                    style="display: flex; justify-content: space-between; align-items: center; margin:3px 0 3px 0;">
                    <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="nav-text">Login</span>
                    @csrf
                </a>
            </li>
        </ul>
    </div>
</aside>


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-bold">Anda harus login untuk mengakses dashboard admin.</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
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
    </section> --}}
@endsection
