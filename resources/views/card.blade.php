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
        {{-- card prodi --}}
        <div class="d-flex flex-cols justify-content-center gap-5 mx-auto">
            @foreach ($subKategoriProdi as $prodi)
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top bg-warning d-flex justify-content-center align-items-center"
                        style="height: 10em">
                        <h1><i class="fa fa-file"></i></h1>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title my-3">{{ $prodi->nama_subKategori }}</h5>
                        <a href="#" class="btn btn-outline-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- card himpunan --}}
        <div class="d-flex flex-cols justify-content-center gap-5 mx-auto">
            @foreach ($subKategoriHimpunan as $himpunan)
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top bg-warning d-flex justify-content-center align-items-center"
                        style="height: 10em">
                        <h1><i class="fa fa-file"></i></h1>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title my-3">{{ $himpunan->nama_subKategori }}</h5>
                        <a href="#" class="btn btn-outline-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
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
