<!DOCTYPE html>
<html lang="en">

@section('title', 'Login Administrator')
@include('admin.layouts.header')

<body>
    <div class="container-fluid bg">
        <div class="form">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="login-form">
                        <h1>TEST LOGIN</h1>
                        <p>Log in to your account with your email <br> and password.</p>
                        <form action="post-login" method="POST">
                            {{ csrf_field() }}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br />
                                    @endforeach
                                </div>
                            @endif
                            <div class="field-group">
                                <input type="email" id="email" name="email" class="input-field"
                                    aria-describedby="email" placeholder="Email address" autocomplete="off">
                            </div>
                            <div class="field-group my-5">
                                <input type="password" id="password" name="password" class="input-field"
                                    aria-describedby="password" placeholder="Password">
                            </div>
                            <div class="form-button d-flex align-items-center">
                                <button type="submit" class="btn btn-primary btn-submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
