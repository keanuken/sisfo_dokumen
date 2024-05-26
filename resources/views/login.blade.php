<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/styleguide.css"/>
<link rel="stylesheet" href="css/style_login.css"/>

@section('title', 'Login Administrator')
@include('admin.layouts.header')

<body>
    <div class="element">
      <div class="div">
        <img class="group" src="assets/group-3.png" />
        <div class="overlap-group">
          <form action="{{ route('admin.postLogin') }}" method="POST">
              {{ csrf_field() }}
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          {{ $error }} <br />
                      @endforeach
                  </div>
              @endif
            <button type="submit" class="primary-button">Masuk</button>
            <img class="img" src="assets/group-3-2.png" />
            <div class="frame"><div class="text-wrapper-2">Email</div></div>
            <div class="div-wrapper"><div class="text-wrapper-2">Password</div></div>
            <input class="rectangle" input type="email" id="email" name="email" autocomplete="off"></input>
            <input class="rectangle-2" type="password" name="password"></input>
            <input type="checkbox" class="rectangle-3" >
            <div class="frame-2"><div class="text-wrapper-3">Remember me</div></div>
            </div>
          </form>
        {{-- belum navbar yg fix --}}
        <div class="navbar">
          <div class="frame-3"></div>
          <div class="group-wrapper"><img class="group-2" src="assets/group-3-2.png" /></div>
          <div class="navbar-2">
          <div class="text-wrapper-4">Beranda</div>
          <div class="text-wrapper-4">Profil</div>
          <div class="text-wrapper-4">Layanan</div>
          <div class="text-wrapper-4">Dokumen</div>
          <img class="vector" src="asset/vector-1.svg" />
          </div>
          {{-- belum footer yg fix --}}
          <img class="vector-2" src="asset/vector-1.svg" />
        </div>
      </div>
    </div>
  </body>

</html>
