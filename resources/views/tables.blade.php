<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <section class="content-body px-3">
            <div class="card card-primary">
                <div class="card-header mb-3">
                    <h3 class="card-title">Data Dokumen</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger my-2 text-bold">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- /.card-header -->
                <table id="example" class="table table-responsive table-striped bg-info" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Dokumen</th>
                            <th class="text-center">Judul Dokumen</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Nama Sub Kategori</th>
                            <th class="text-center">Versi Dokumen</th>
                            <th class="text-center">Status Dokumen</th>
                            <th class="text-center">Lihat Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($document as $doc)
                            <tr>
                                <td class="text-center"></td>
                                <td class="d-none">{{ $doc->id_document }}</td>
                                <td class="text-center">{{ $doc->nama_dokumen }}</td>
                                <td class="text-center">{{ $doc->judul_dokumen }}</td>
                                <td class="text-center">{{ $doc->nama_kategori }}</td>
                                <td class="text-center">{{ $doc->nama_subKategori }}</td>
                                <td class="text-center">Versi {{ $doc->versi_dokumen }}</td>
                                <td class="text-center">{{ $doc->status }}</td>
                                <td class="text-center">
                                    <a href="https://{{ $doc->tautan_dokumen }}" target="_blank" class="btn btn-info">
                                        <i class="fa fa-eye text-white"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Dokumen</th>
                            <th class="text-center">Judul Dokumen</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Nama Sub Kategori</th>
                            <th class="text-center">Versi Dokumen</th>
                            <th class="text-center">Status Dokumen</th>
                            <th class="text-center">Lihat Dokumen</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
