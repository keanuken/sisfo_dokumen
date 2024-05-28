@extends('himpunan.layouts.master')
@section('title', 'Beranda Himpunan')

@include('himpunan.layouts.header')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('himpunan.home') }}" class="brand-link">
        <div class="text-center">
            <img src="{{ asset('logo-kecil.png') }}" alt="Simadok Logo" class="brand-image">
            <span class="brand-text font-weight-bold">SIMADOK</span>
        </div>
    </a>

    <!-- Logout Button -->
    <div class="sidebar-bottom p-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
        <ul class="nav flex-column">
            <li class="nav-item bg-primary rounded">
                <a class="nav-link" href="{{ route('himpunan.login') }}"
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
                    <h1 class="text-bold">Anda harus login untuk mengakses dashboard himpunan.</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
