<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | AdminLTE</title>

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

<body class="hold-transition register-page">
<div class="register-box">

  <!-- LOGO -->
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <!-- CARD -->
  <div class="card">
    <div class="card-body register-card-body">

      <p class="login-box-msg">Register a new membership</p>

      <!-- FORM -->
      <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <!-- NAME -->
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- EMAIL -->
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- PASSWORD -->
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- TERMS -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" required>
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              Register
            </button>
          </div>
        </div>

      </form>

      <!-- LINK LOGIN -->
      <a href="{{ route('login') }}" class="text-center">
        I already have a membership
      </a>

    </div>
  </div>

</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- ================= SWEET ALERT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // REGISTER BERHASIL
    @if(session('register_success'))
    Swal.fire({
        icon: 'success',
        title: 'Register Berhasil',
        text: 'Mengalihkan ke halaman login...',
        timer: 2000,
        showConfirmButton: false,
        timerProgressBar: true
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
    @endif

    // VALIDASI ERROR
    @if ($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ $errors->first() }}'
    });
    @endif

});
</script>

</body>
</html>