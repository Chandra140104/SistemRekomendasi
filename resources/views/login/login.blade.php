<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Login</title>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom SweetAlert Size -->
  <style>
    .swal-small {
        font-size: 0.9rem;
    }

    @media (max-width: 576px) {
        .swal-small {
            width: 90% !important;
            font-size: 0.85rem;
        }
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4 offset-8">
            <button type="submit" class="btn btn-primary btn-block">
              Sign In
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- ================= SWEETALERT ================= --}}

{{-- LOGIN GAGAL --}}
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: '{{ session('error') }}',
    width: '20rem',
    padding: '1.2rem',
    confirmButtonText: 'OK',
    customClass: {
        popup: 'swal-small'
    }
});
</script>
@endif

{{-- LOGIN BERHASIL --}}
@if(session('login_success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil',
        text: 'Selamat datang di sistem',
        width: '20rem',
        padding: '1.2rem',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        customClass: {
            popup: 'swal-small'
        }
    }).then(() => {
        // Redirect SETELAH animasi selesai
        window.location.href = "{{ route('dashboard') }}";
    });
});
</script>
@endif

</body>
</html>
