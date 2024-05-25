<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/792ca5f7d2.js" crossorigin="anonymous"></script>
    {{-- footer --}}
    <link rel="stylesheet" href="{{asset('css/globals.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="header">
        <!-- header -->
    </div>
    <div class="card text-center">
        <div class="card" style=" color: #F49D1B;
            font-family: Righteous, sans-serif;
            font-size: 48px;" >
            Selamat datang di dashboard SIMADOK!
        </div>
        <div class="card-body">
        <div class="container-fluid p-2"></div>

    {{-- card-group --}}
    <div class="card-group">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <h5 class="text">Dokumen</h5>
            <a href="#" class="btn btn-primary" style="background-color: #F49D1B">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <h5 class="text">Dokumen</h5>
            <a href="#" class="btn btn-primary" style="background-color: #F49D1B">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          </div>
          <div class="card-footer">
            <h5 class="text">Dokumen</h5>
            <a href="#" class="btn btn-primary" style="background-color: #F49D1B">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>

    {{-- table dokumen --}}
    <div class="container" style="padding-top: 50px">
        <table id="example" class="table table-striped" style="width:100%">
            <button type="button" class="btn btn-primary" style="margin-left: 89%">Tambah Akun</button>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Judul Dokumen</th>
                    <th>Tautan Dokumen</th>
                    <th>Versi Dokumen</th>
                    <th>Tanggal Dokumen</th>
                    <th>Status</th>
                    <th>Image Preview</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Penting</td>
                    <td>apa</td>
                    <td>2024</td>
                    <td>Private</td>
                    <td>Private</td>
                    <td>aktif</td>
                    <td>
                        <span class="action_btn">
                        <a href="#"><i class="fa-solid fa-eye fa-lg"; style="color: #F49D1B; margin-right: 50px"></i></a>
                    </td>
                    <td>
                        <span class="action_btn">
                            <a href="#"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            <a href="#"><i class="fa-solid fa-trash-can fa-lg p-1;" style=" color: rgb(248, 29, 29);"></i></a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- footer -->
    <section class="section-footer">
        <div class="footer-content bg-dark" style="color: #ffff; font-family: Roboto, sans-serif; text-align: left;">
        <footer>
            <div class="row p-3 m-5" >
                <div class="col" >
                    <div class="wrapper-col-1" style="font-size: 24px; font-family: Roboto, sans-serif;
                    font-weight: 700;
                    font-style: normal;">
                        <br>
                        <p>Jl. PKH. Mustopha No.23, Bandung 40124</p>
                        <p>Phone: +62-22-7272215 Ext.200</p>
                        <p>Fax: +62-227202892</p>
                    </div>
                </div>
                <div class="col">
                    <div class="wrapper-col-2">
                        <div class="input-group flex">
                            <img class="logo-itenas" src="assets/logo_itenas.png" style="height: 94px; margin-top: 20px"/>
                            <div class="list-group">
                                <b><p class="mb-1" style="font-family: Palanquin Dark, sans-serif; font-size: 48px; color:#1F6BFF ; font-weight: 700; font-style: bold; margin-left: 10px">SIMADOK</p></b>
                                <p style="font-family: Palanquin Dark, sans-serif; font-size: 20px; margin-left: 10px">Sistem Informasi Manajemen Dokumen</p>
                            </div>
                        </div>
                        <p style="font-family: righteous; font-size: 24px;">Copyright © 2024 SIMADOK. All Rights Deserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </section>



<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- TableEdit plugin -->
<script type="text/javascript" charset="utf8" src="path/to/jquery.tabledit.js"></script>

<script>
    $.fn.dataTable.ext.errMode = 'throw';</script>

<script>new DataTable('#example');</script>
<script>
/* new DataTable('#example'); */
/* $('#example').DataTable( {
    data: data
} );
$('#example').DataTable( {
    data: data,
    columns: [
        { data: 'pemilik_dokumen' },
        { data: 'jenis_dokumen' },
        { data: 'tahun' },
        { data: 'status' },
        { data: 'keterangan' }
    ]
} );
*/
/* new DataTable('#example', {
    ajax: 'data/arrays.txt'
}); */

$(document).ready(function() {
    var dataTable = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetch.php",
            type: "POST"
        }
    });

    $('#example').on('draw.dt', function() {
        $('#example').TableEdit({
            url: 'action.php',
            dataType: 'json',
            columns: {
                identifier: [0, 'id'],
                editable: [[1, 'nama_dokumen'], [2, 'judul_dokumen'], [3, 'versi_dokumen'], [4, 'tautan_dokumen'], [5, 'image_preview'], [6, 'tanggal_dokumen'], [7, 'status', '{"1":"Aktif", "2":"Tidak Aktif"}']]
            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                    $('#example').DataTable().ajax.reload();
                }
            }
        });
    });
});

</script>
</script>
</body>
</html>
