<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel API</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('plugins/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="login-page" data-new-gr-c-s-check-loaded="14.996.0" data-gr-ext-installed="" style="min-height: 398px;">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>{{ config('app.name') }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form method="post" action="{{ route('password.request') }}">
        @csrf
        <input type="hidden" name="token" value="{{ old('token', $data['token']) }}">
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $data['email']) }}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if($errors->has('email'))
              <div class="invalid-feedback">
                  {{ $errors->first('email') }}
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if($errors->has('password'))
              <div class="invalid-feedback">
                  {{ $errors->first('password') }}
              </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if($errors->has('password_confirmation'))
              <div class="invalid-feedback">
                  {{ $errors->first('password_confirmation') }}
              </div>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('plugins/adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>