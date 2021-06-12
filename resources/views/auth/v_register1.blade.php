<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="{{ asset('template_user') }}/images/logo_dairyfarm.jpg">

  <title>Register</title>

  {{-- ALert --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"></link>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet"></link>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h2><b>REGISTER</b></h2>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Isi form untuk membuat akun</p>

        <form action="{{ route('register') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
            @error('passsword')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" value="{{ old('password_confirmation') }}" required>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" onclick="sweetAlert()">Register</button>
        </form>
        <br><font color="black">Sudah punya akun?</font> <a href="/login" class="text-center">Login sekarang!</a>

      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="{{ asset('template_admin') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('template_admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template_admin') }}/dist/js/adminlte.min.js"></script>

  {{-- ALert --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <script type="text/javascript">
    function sweetAlert()
    {
    Swal.fire(
    'Register',
    'Register Berhasil',
    'Berhasil'
    )
    }
    </script>
</body>

</html>
