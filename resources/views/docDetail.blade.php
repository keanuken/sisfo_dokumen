<!DOCTYPE html>
<html lang="en">

@section('title', 'Dokumen Detail')
@include('component.header')

<body>
    @include('component.navbar')

    <section class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail Dokumen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Detail Dokumen</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="card">
            <div class="card-header">
                Dokumen {{ $document->judul_dokumen }}
            </div>
            @if ($document->image_preview != null)
                <a href="{{ url('/uploads/' . $document->image_preview) }}" target="_blank">
                    <div class="image position-relative"
                        style="background: url({{ url('/uploads/' . $document->image_preview) }}) no-repeat center center; background-size: contain ; height: 30em;">
                    </div>
                </a>
            @else
                <div class="bg-secondary text-center">
                    <i class="far fa-images" style="font-size: 10em"></i>
                    <h1>Tidak ada gambar unggahan.</h1>
                </div>
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Judul Dokumen <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-uppercase" name="nama" disabled
                        value="{{ $document->judul_dokumen }}">
                </div>
                <div class="form-group">
                    <label for="name">Versi Dokumen <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-uppercase" disabled name="nama"
                        value="{{ $document->versi_dokumen }}">
                </div>
                <div class="form-group">
                    <label for="name">Status Dokumen <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-uppercase" disabled name="nama"
                        value="{{ $document->status }}">
                </div>
            </div>
            <div class="card-footer">
                <a href="https://{{ $document->tautan_dokumen }}" target="_blank" class="btn btn-primary">Buka Tautan
                    Dokumen</a>
            </div>
        </div>
    </section>

    @include('component.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
