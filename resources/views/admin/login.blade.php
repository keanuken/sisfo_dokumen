<!DOCTYPE html>
<html lang="en">

@section('title', 'Login Himpunan')
@include('admin.layouts.header')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{ url('/') }}" class="navbar-brand mx-5">
            <img class="group-2" width="auto" height="50" src="{{ asset('assets/group-3-2.png') }}" />
        </a>
        <button class="navbar-toggler ml-auto py-2 mt-4" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mx-5 d-flex justify-content-around">
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item active text-bold">
                    <a class="nav-link" href="#">Hubungi</a>
                </li>
                <div class="dropdown">
                    <button class="btn text-white btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2"><i class="fa fa-tachometer-alt"></i></span>
                        Dashboard
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.login') }}">Dashboard Admin</a>
                        <a class="dropdown-item" href="{{ route('himpunan.loginHimpunan') }}">Dashboard Himpunan</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row w-100">
            <div class="col-md-8 col-lg-10 mx-auto">
                <form action="{{ route('admin.postLogin') }}" method="POST">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif
                    <div class="form-login d-flex flex-column">
                        <div class="card" style="background-color: #eeeeee;">
                            <div class="card-header border-0 mt-5 d-flex justify-content-center">
                                <img class="img" width="auto" height="75"
                                    src="{{ asset('assets/group-3-2.png') }}" />
                            </div>
                            <div class="card-body p-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Masukkan email">
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
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn btn-primary px-5 py-2 mt-5 text-bold">Masuk</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('component.footer')
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var passwordFieldType = passwordField.getAttribute('type');
            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.setAttribute('type', 'password');
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
