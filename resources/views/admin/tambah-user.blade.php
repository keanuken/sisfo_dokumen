@extends('admin.layouts.master')
@section('title', 'Tambah Akun')

@include('admin.layouts.header')

@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@include('admin.layouts.sidebar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Akun</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-primary mt-10">
            <div class="card-header">
                <h3 class="card-title">Register Akun</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="store-register" method="POST">
                @csrf
                {{-- alert --}}
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
                {{-- end alert --}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" class="form-control" name="name" placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control"
                                aria-describedby="passwordHelpBlock" placeholder="Password">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-info">*harap memasukkan password minimal 8 karakter</p>
                    </div>

                    <div class="form-group">
                        <label>Role Akun</label>
                        <select name="roles" id="roles" class="js-states form-control" style="width: 100% !important">
                            <option></option>
                            <option value="administrator">Administrator</option>
                            <option value="kaprodi">Ketua Program Studi</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-white">
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>

@section('script')
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#roles").select2({
            placeholder: "Pilih Role Akun",
            theme: "bootstrap4",
            width: 'resolve',
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                if ($("#password").attr("type") === "password") {
                    $("#password").attr("type", "text");
                    $(this).children("i").removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    $("#password").attr("type", "password");
                    $(this).children("i").removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });
    </script>
@endsection

@endsection
