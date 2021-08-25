<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/jpg" href="{{ asset('template_user') }}/images/logo_dairyfarm.jpg">

  <title>PT Agri Servis Sakti</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template_admin') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
@if (session('pesan'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i>Data yang anda masukkan salah</h4>
    {{ session('pesan') }}.
  </div>
@endif

@include('sweetalert::alert')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h2><b>Verifikasi Email</b></h2>
    </div>
    <div class="card-body text-center">
      @if(session('status'))
        <p class="login-box-msg">{{ session('status') }}</p>
      @endif

      <p class="login-box-msg">
        Terimakasih telah mendaftar. Sebelum mulai, anda harus memverifikasi alamat email anda. Tidak menerima
        email?
      </p>

      <form action="{{ route('verification.send') }}" method="post">
        {{ csrf_field() }}

        <button type="submit" class="btn btn-primary btn-block">Kirim ulang</button>
      </form>
      <br><a href="{{ route('logout') }}" class="text-center">Keluar</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('template_admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template_admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template_admin') }}/dist/js/adminlte.min.js"></script>

<!-- jquery show password -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#show-password').click(function () {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

<!-- Menghilangkan Modal -->
<script>
  window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 3000);
</script>
</body>

</html>
