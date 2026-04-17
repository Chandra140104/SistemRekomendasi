<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | AdminLTE</title>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body.login-page {
      background: linear-gradient(135deg, #eef3f6 0%, #dfe7ec 100%);
      min-height: 100vh;
    }

    .login-layout {
      align-items: center;
      display: grid;
      grid-template-columns: minmax(420px, 1fr) 420px;
      gap: 110px;
      min-height: 100vh;
      margin: 0 auto;
      max-width: 1280px;
      padding: 32px 56px;
      transform: translateY(-20px);
      width: 100%;
    }

    .brand-panel {
      color: #0b4f2f;
      max-width: 620px;
      justify-self: center;
    }

    .brand-title {
      font-size: clamp(48px, 7vw, 96px);
      font-weight: 900;
      letter-spacing: 8px;
      line-height: .95;
      margin: 0;
      text-transform: uppercase;
    }

    .brand-subtitle {
      color: #f0a500;
      font-size: clamp(20px, 2.6vw, 38px);
      font-weight: 800;
      letter-spacing: 5px;
      margin-top: 18px;
      text-transform: uppercase;
    }

    .brand-company {
      color: #1f2937;
      font-size: clamp(16px, 1.6vw, 24px);
      font-weight: 700;
      letter-spacing: 1.5px;
      margin-top: 12px;
    }

    .login-box {
      justify-self: center;
      margin: 0;
      width: 100%;
    }

    .login-card {
      border-radius: 16px;
      box-shadow: 0 22px 55px rgba(15, 23, 42, .16);
      overflow: hidden;
    }

    .login-card .card-header {
      background: #fff;
    }

    .swal-small {
      font-size: 0.9rem;
    }

    @media (max-width: 991.98px) {
      .login-layout {
        grid-template-columns: 1fr;
        gap: 34px;
        padding: 34px 22px;
        transform: none;
      }

      .brand-panel {
        text-align: center;
      }

      .login-box {
        margin: 0 auto;
        max-width: 420px;
      }
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="login-layout">
<div class="brand-panel">
  <h1 class="brand-title">FOXAPAINT</h1>
  <div class="brand-subtitle">COLORING THE WORLD</div>
  <div class="brand-company">PT.Primantara Nusa Samasta</div>
</div>

<div class="login-box">

  <div class="card card-outline card-primary login-card">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login.process') }}" method="POST">
        @csrf

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

        <!-- REMEMBER ME + BUTTON -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              Sign In
            </button>
          </div>
        </div>

      </form>

      <!-- ❌ SOCIAL LOGIN DIHAPUS -->

      <!-- OPTIONAL -->
      <a href="{{ route('password.request') }}">I forgot my password</a><br>

      <a href="{{ route('register') }}"> Register a new membership</a>

    </div>
  </div>

</div>
</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- ================= SWEET ALERT ================= --}}

{{-- LOGIN GAGAL --}}
@if(session('error'))
<script>
Swal.fire({
  icon: 'error',
  title: 'Login Gagal',
  text: '{{ session('error') }}',
  width: '20rem',
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
    text: 'Selamat Datang',
    width: '20rem',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
    customClass: {
      popup: 'swal-small'
    }
  }).then(() => {
    window.location.href = "{{ route('dashboard') }}";
  });
});
</script>
@endif

</body>
</html>
