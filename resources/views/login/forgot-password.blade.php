<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password | AdminLTE</title>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
<div class="login-box">

  <!-- LOGO -->
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <!-- CARD -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">
        You forgot your password? Here you can easily retrieve a new password.
      </p>

      <!-- FORM -->
      <form action="#" method="POST">
        @csrf

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">
              Request new password
            </button>
          </div>
        </div>
      </form>

      <!-- LINK -->
      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>

      <p class="mb-0">
        <a href="#">
          Register a new membership
        </a>
      </p>

    </div>
  </div>

</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- OPTIONAL SWEET ALERT --}}
@if(session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{{ session('success') }}'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
  icon: 'error',
  title: 'Gagal',
  text: '{{ session('error') }}'
});
</script>
@endif

</body>
</html>