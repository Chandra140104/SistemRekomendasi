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
    body.layout-top-nav {
      background: linear-gradient(135deg, #eef3f6 0%, #dfe7ec 100%);
      min-height: 100vh;
    }

    .login-content-wrapper {
      background: transparent;
      min-height: calc(100vh - 57px);
    }

    .login-layout {
      align-items: center;
      display: grid;
      grid-template-columns: minmax(420px, 1fr) 420px;
      gap: 110px;
      min-height: calc(100vh - 114px);
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
      font-size: clamp(42px, 5vw, 72px);
      font-weight: 900;
      letter-spacing: 5px;
      line-height: 1.08;
      margin: 0;
      text-transform: uppercase;
    }

    .brand-subtitle {
      color: #f0a500;
      font-size: clamp(20px, 2.4vw, 34px);
      font-weight: 800;
      letter-spacing: 3px;
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

    .recommendation-flow {
      margin: -20px auto 44px;
      max-width: 760px;
      padding: 0 24px;
    }

    .flow-title {
      color: #1f2937;
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 26px;
      text-align: center;
      text-transform: uppercase;
    }

    .flow-timeline {
      margin: 0 auto;
      max-width: 620px;
      position: relative;
    }

    .flow-timeline::before {
      background: #0b4f2f;
      bottom: 18px;
      content: "";
      left: 50%;
      position: absolute;
      top: 18px;
      transform: translateX(-50%);
      width: 3px;
    }

    .flow-item {
      align-items: flex-start;
      display: grid;
      gap: 18px;
      grid-template-columns: 1fr 52px 1fr;
      margin-bottom: 22px;
      position: relative;
    }

    .flow-number {
      align-items: center;
      background: #0b4f2f;
      border: 4px solid #eef3f6;
      border-radius: 50%;
      color: #fff;
      display: flex;
      font-weight: 800;
      height: 52px;
      justify-content: center;
      position: relative;
      width: 52px;
      z-index: 1;
    }

    .flow-content {
      background: #fff;
      border-left: 4px solid #f0a500;
      border-radius: 8px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
      padding: 14px 16px;
    }

    .flow-left .flow-content {
      border-left: 0;
      border-right: 4px solid #f0a500;
      grid-column: 1;
      grid-row: 1;
      text-align: right;
    }

    .flow-left .flow-number {
      grid-column: 2;
      grid-row: 1;
    }

    .flow-left .flow-spacer {
      grid-column: 3;
      grid-row: 1;
    }

    .flow-content h3 {
      color: #0b4f2f;
      font-size: 17px;
      font-weight: 800;
      margin: 0 0 5px;
    }

    .flow-content p {
      color: #4b5563;
      margin: 0;
    }

    .flow-spacer {
      min-height: 1px;
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

      .recommendation-flow {
        margin-top: 10px;
      }

      .flow-timeline::before {
        left: 26px;
      }

      .flow-item {
        grid-template-columns: 52px 1fr;
      }

      .flow-spacer {
        display: none;
      }

      .flow-left .flow-content,
      .flow-left .flow-number {
        grid-column: auto;
        grid-row: auto;
      }

      .flow-left .flow-content {
        border-left: 4px solid #f0a500;
        border-right: 0;
        text-align: left;
      }

    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ route('landing') }}" class="navbar-brand">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('product') }}" class="nav-link">Product</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link active">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper login-content-wrapper">
    <div class="login-layout">
      <div class="brand-panel">
        <h1 class="brand-title">SISTEM REKOMENDASI</h1>
        <div class="brand-subtitle">PT PRIMANTARA NUSA SAMASTA</div>
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

  </div>

  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
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
