<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_footer.css') }}">
</head>

<body>
    <div class="header">
        <a href="home">
            <img class="img" src="{{ asset('assets/group-4.png')}}" />
            <div class="auto-layout">
                <a href="" class="text-wrapper-5">Beranda</a>
                <a href="footer" class="text-wrapper-6">Kontak</a>
                <div class="group-wrapper">
                    <div class="group-2">
                        <span class="d-flex align-items-center">
                            <img class="profile" src="{{ asset('assets/profile.svg')}}" />
                            <a href="{{ route('beranda.logoutBeranda')}}" class="text-wrapper-7">Logout</a>
                    </div>
                </div>
            </div>
    </div>    
    <div class="desktop">
        <div class="div">
            <div class="overlap">
                <div class="banner">
                    <div class="overlap-group">
                        <img class="carousel" src="assets/carousel.png" />
                        <div class="overlap-2">
                            <p class="p">Selamat datang di website SIMADOK!</p>
                            <p class="text-wrapper-2">Masuk terlebih dahulu untuk melanjutkan.</p>
                        </div>
                    </div>
                </div>
                <p class="text-wrapper-3">Selamat datang di dashboard SIMADOK!</p>
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
