<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styleguide.css"/>
    <link rel="stylesheet" href="css/style.css"/>
  </head>
  <body>
    <div class="element">
      <div class="div">
        <img class="group" src="assets/group-3.png" />
        <form action="post-login" method="POST">
          {{ csrf_field() }}
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
              </div>
          @endif
        <div class="overlap-group">
          <button type="submit" class="primary-button">Masuk</button>
          <img class="img" src="assets/group-3-2.png" />
          <div class="frame"><div class="text-wrapper-2">Username</div></div>
          <input type="email" id="email" name="email" class="rectangle">
          <div class="div-wrapper"><div class="text-wrapper-2">Password</div></div>
          <input type="password" id="password" name="password" class="rectangle-2">
          <input type="checkbox" class="rectangle-3" >
          <div class="frame-2"><div class="text-wrapper-3">Remember me</div></div>
        </div>
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
          <img class="vector-2" src="asset/vector-1.svg" />
        </div>
      </div>
    </div>
  </body>
</html>
