@extends('himpunan.layouts.master')
@section('title', 'Tambah Dokumen Himpunan')

@include('himpunan.layouts.header')

@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@include('himpunan.layouts.sidebar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Dokumen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('himpunan.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Dokumen Himpunan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-primary mt-10">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Dokumen</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('himpunan.store-dokumen') }}" method="POST" enctype="multipart/form-data">
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
                        <label>Masukkan Sub Kategori Dokumen <span class="text-danger">*</span></label>
                        <div class="d-flex flex-col justify-content-beetween">
                            <select name="subKategori" id="subKategori" class="js-states form-control"
                                style="width: 100% !important">
                                <option></option>
                                @foreach ($subKategori as $sub)
                                    <option value="{{ $sub->id_subKategori }}">
                                        {{ $sub->nama_subKategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="clear-sub">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Masukkan Sub Sub Kategori Dokumen</label>
                        <p class="text-info">*masukkan bila ada</p>
                        <div class="d-flex flex-col justify-content-beetween">
                            <select name="subSubKategori" id="subSubKategori" class="js-states form-control"
                                style="width: 100% !important">
                                <option></option>
                                @foreach ($subSubKategori as $subsub)
                                    <option value="{{ $subsub->id_subSubKategori }}">{{ $subsub->id_subSubKategori }} -
                                        {{ $subsub->nama_subSubKategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="clear-subsub">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama dokumen">
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan judul dokumen">
                    </div>

                    <div class="form-group">
                        <label>Versi Dokumen <span class="text-danger">*</span></label>
                        <div class="d-flex flex-col justify-content-between">
                            <select name="versi" id="versi" class="js-states form-control"
                                style="width: 100% !important">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="clear-versi">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tautan">Tautan Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tautan" placeholder="Masukkan tautan dokumen">
                    </div>

                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <div class="d-flex flex-col justify-content-beetween">
                            <select name="status" id="status" class="js-states form-control"
                                style="width: 100% !important">
                                <option></option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="clear-status">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Preview Gambar Dokumen</label>
                        <p class="text-info">*Silahkan input gambar jika ada</p>
                        <input type="file" name="gambar" id="gambar" class="d-none">
                        <label for="gambar" class="btn btn-primary col start">
                            <i class="fas fa-upload"></i>
                            <span>Upload gambar</span>
                        </label>
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
        $("#versi").select2({
            tags: true,
            placeholder: "Pilih versi dokumen atau masukkan nilai baru",
            theme: "bootstrap4",
            width: 'resolve',
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newOption: true
                };
            },
            templateResult: function(data) {
                var $result = $('<span></span>');

                $result.text(data.text);

                if (data.newOption) {
                    $result.append(' <em>(nilai baru)</em>');
                }

                return $result;
            }
        });
        $('#clear-versi').click(function() {
            $('#versi').val(null).trigger('change');
        });
    </script>
    <script>
        $("#status").select2({
            placeholder: "Pilih status dokumen",
            theme: "bootstrap4",
            width: 'resolve',
        });
        $('#clear-status').click(function() {
            $('#status').val(null).trigger('change');
        });
    </script>
    <script>
        $("#subKategori").select2({
            placeholder: "Pilih sub kategori dokumen",
            theme: "bootstrap4",
            width: 'resolve',
        });
        $('#clear-sub').click(function() {
            $('#subKategori').val(null).trigger('change');
        });
    </script>
    <script>
        $("#subSubKategori").select2({
            placeholder: "Pilih sub sub kategori dokumen",
            theme: "bootstrap4",
            width: 'resolve',
        });
        $('#clear-subsub').click(function() {
            $('#subSubKategori').val(null).trigger('change');
        });
    </script>

@endsection
@endsection
