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
      background-color: #ffffff;
      background-image:
        linear-gradient(45deg, transparent 49%, #e5e7eb 49%, #e5e7eb 51%, transparent 51%),
        linear-gradient(-45deg, transparent 49%, #e5e7eb 49%, #e5e7eb 51%, transparent 51%);
      background-size: 40px 40px;
      min-height: 100vh;
    }

    body.layout-top-nav .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .login-content-wrapper {
      background: transparent;
      flex: 1 0 auto;
      min-height: auto;
    }

    .social-topbar {
      background: #ed5d17;
      padding: 8px 0;
    }

    .social-topbar-inner {
      align-items: center;
      display: flex;
      gap: 14px;
    }

    .social-topbar-link {
      align-items: center;
      background: #ffffff;
      border-radius: 50%;
      color: #ed5d17;
      display: inline-flex;
      font-size: 15px;
      height: 30px;
      justify-content: center;
      transition: .2s ease-in-out;
      width: 30px;
    }

    .social-topbar-link:hover {
      background: #ffe5d8;
      color: #b74206;
    }

    .public-brand-logo {
      display: block;
      height: 34px;
      max-width: 220px;
      object-fit: contain;
      width: auto;
    }

    .landing-navbar {
      padding-bottom: 0.8rem;
      padding-top: 0.8rem;
    }

    .landing-navbar .navbar-nav {
      column-gap: 26px;
    }

    .landing-navbar .navbar-brand {
      margin-right: 2.5rem;
    }

    .landing-navbar .nav-link {
      color: #1f3f6f !important;
      font-weight: 600;
      padding-left: 0.9rem;
      padding-right: 0.9rem;
    }

    .landing-navbar .nav-link:hover,
    .landing-navbar .nav-link:focus {
      color: #163255 !important;
    }

    .landing-navbar .dropdown-menu {
      border-radius: 8px;
      margin-top: 0;
      min-width: 240px;
    }

    .landing-navbar .dropdown-item {
      color: #1f3f6f;
      font-weight: 600;
      padding: 0.65rem 1rem;
    }

    .landing-navbar .dropdown-item:hover,
    .landing-navbar .dropdown-item:focus {
      background-color: #1f3f6f;
      color: #ffffff;
    }

    @media (min-width: 992px) {
      .landing-navbar .dropdown > .dropdown-menu {
        display: none;
      }

      .landing-navbar .dropdown:hover > .dropdown-menu {
        display: block;
      }

      .landing-navbar .dropdown:hover > .nav-link {
        color: #163255 !important;
      }
    }

    .login-layout {
      align-items: center;
      display: grid;
      grid-template-columns: minmax(420px, 1fr) 420px;
      gap: 110px;
      min-height: calc(100vh - 210px);
      margin: 0 auto;
      max-width: 1280px;
      padding: 24px 56px 10px;
      width: 100%;
    }

    .brand-panel {
      color: #0b4f2f;
      max-width: 620px;
      justify-self: center;
    }

    .brand-title {
      color: #ed5d17;
      font-size: clamp(42px, 5vw, 72px);
      font-weight: 900;
      letter-spacing: 5px;
      line-height: 1.08;
      margin: 0;
      text-transform: uppercase;
    }

    .brand-subtitle {
      color: #1f3f6f;
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
      border-bottom: 4px solid #1f3f6f;
      border-radius: 16px;
      box-shadow: 0 22px 55px rgba(15, 23, 42, .16);
      overflow: hidden;
    }

    .login-card.card-outline {
      border-top: 3px solid #ed5d17;
    }

    .login-card .card-header {
      background: #fff;
    }

    .login-card-logo {
      display: inline-block;
      max-width: 240px;
      width: 100%;
    }

    .login-card-logo img {
      display: block;
      height: auto;
      max-width: 100%;
      width: 100%;
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

    .login-footer {
      background: #1f3f6f;
      color: #ffffff;
      flex-shrink: 0;
      margin-top: -36px;
      position: relative;
      z-index: 2;
    }

    .login-footer strong {
      color: #ffffff;
    }

    @media (max-width: 991.98px) {
      .login-layout {
        grid-template-columns: 1fr;
        gap: 34px;
        padding: 34px 22px 12px;
        min-height: auto;
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
  <div class="social-topbar">
    <div class="container">
      <div class="social-topbar-inner">
        <a href="https://wa.me/6282134054713" class="social-topbar-link" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-phone-alt"></i>
        </a>
        <a href="mailto:marketing@primantaraindo.com" class="social-topbar-link" aria-label="Email">
          <i class="fas fa-envelope"></i>
        </a>
        <a href="https://share.google/2aq90s8Y9LbSo5w2j" class="social-topbar-link" aria-label="Alamat" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-map-marker-alt"></i>
        </a>
      </div>
    </div>
  </div>

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white landing-navbar">
    <div class="container">
      <a href="{{ route('landing') }}" class="navbar-brand">
        <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo" class="public-brand-logo">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="productDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Product</a>
            <div aria-labelledby="productDropdown" class="dropdown-menu border-0 shadow">
              <a href="{{ route('penjelasan-kategori-produk') }}" class="dropdown-item">Penjelasan kategori produk</a>
              <a href="{{ route('penjelasan-sub-kategori') }}" class="dropdown-item">Penjelasan sub kategori</a>
              <a href="{{ route('landing') }}#katalog-cat" class="dropdown-item">Katalog produk</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="aboutDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">About</a>
            <div aria-labelledby="aboutDropdown" class="dropdown-menu border-0 shadow">
              <a href="{{ route('about') }}#penjelasan-sistem-rekomendasi" class="dropdown-item">Penjelasan sistem rekomendasi</a>
              <a href="{{ route('about') }}#content-based-filtering" class="dropdown-item">Metode content-based filtering</a>
              <a href="{{ route('about') }}#alur-sistem" class="dropdown-item">Alur sistem</a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-1"></i>Login
            </a>
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
      <a href="{{ route('landing') }}" class="login-card-logo">
        <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo">
      </a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

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
      <a href="{{ route('password.request') }}">Lupa password?</a><br>

      <a href="{{ route('register') }}">Daftar akun baru</a>

    </div>
  </div>

      </div>
    </div>

  </div>

  <footer class="main-footer text-center login-footer">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- ================= SWEET ALERT ================= --}}
<script>
document.querySelectorAll('.landing-navbar .dropdown-toggle').forEach((toggle) => {
  toggle.addEventListener('click', (event) => {
    if (window.innerWidth >= 992) {
      event.preventDefault();
      event.stopPropagation();
    }
  });
});
</script>

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

@if(session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{{ session('success') }}',
  width: '22rem',
  confirmButtonText: 'OK',
  customClass: {
    popup: 'swal-small'
  }
});
</script>
@endif

</body>
</html>
