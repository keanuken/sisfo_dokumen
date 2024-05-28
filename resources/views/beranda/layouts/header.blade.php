<div class="header">
    <a href="home">
        <img class="img" src="{{ asset('assets/group-4.png')}}" />
        <div class="auto-layout">
            <a href="" class="text-wrapper-5">Beranda</a>
            <a href="footer" class="text-wrapper-6">Kontak</a>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Dokumen
                </a>
              
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('beranda.subProdi')}}">Dokumen Prodi</a></li>
                  <li><a class="dropdown-item" href="#">Dokumen Himpunan</a></li>
                </ul>
              </div>
            <div class="group-wrapper">
                <div class="group-2">
                    <span class="d-flex flex-cols justify-space-between align-items-center text-white">
                        <i class="fa fa-times"></i>
                        <a href="{{ route('beranda.logoutBeranda')}}" class="text-wrapper-7">Logout</a>
                </div>
            </div>
        </div>
</div>    