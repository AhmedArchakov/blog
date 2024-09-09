<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <div class="card">
        <div class="card-body register-card-body">


            <h3 class="login-box-msg">Вход</h3>

            <form action="{{ route('login') }}" method="post">
                @csrf
                @if(session('error'))
                    <span class="error invalid-feedback d-block text-center"
                          style="font-size: 100%">{{ session('error') }}</span>
                @endif

                <div class="input-group mt-3">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback d-block">{{ $message }}</span>
                @enderror

                <div class="input-group mt-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback d-block">{{ $message }}</span>
                @enderror

                <div class="input-group mt-3 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Вход</button>
                </div>
            </form>

            <a href="{{ route('register.form') }}" class="text-center">Регистрация</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
