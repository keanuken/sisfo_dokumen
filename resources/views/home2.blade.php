<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style_footer.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    </head>
    <body>
        <div class="desktop">
            <div class="div">
                <div class="overlap">
                    <div class="banner">
                        <div class="overlap-group">
                            <img class="carousel" src="assets/carousel.png" />
                        </div>
                    </div>
                    <div class="frame"><img class="group" src="img/group-3-3.png" /></div>
                <table > 
                <thead>
                    <tr>
                        <th>Pemilik Dokumen</th>
                        <th>Jenis Dokumen</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Ket</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table_document as $dokumen)
                        <tr>
                            <td>{{$dokumen->Pemilik kdokumen}}</td>
                            <td>{{$dokumen->Pemili kdokumen}}</td>
                            <td>{{$dokumen->Pemili kdokumen}}</td>
                        </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>
        @include('component.footer-home')
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
