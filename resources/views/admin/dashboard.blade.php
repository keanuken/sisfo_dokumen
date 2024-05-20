@extends('admin.layouts.master')
@section('title', 'Dashboard')

@include('admin.layouts.header')

@section('content')
    <section class="content-header">
        <?php $authController = new App\Http\Controllers\AuthController(); ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $authController->showUserName() }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

    </section>

@endsection
