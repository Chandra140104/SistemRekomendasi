<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Sistem Rekomendasi</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

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

    .register-content-wrapper {
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

    .register-layout {
      align-items: center;
      display: grid;
      gap: 80px;
      grid-template-columns: minmax(420px, 1fr) 460px;
      margin: 0 auto;
      max-width: 1280px;
      min-height: calc(100vh - 145px);
      padding: 18px 56px 4px;
      width: 100%;
    }

    .brand-panel {
      justify-self: center;
      max-width: 620px;
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

    .brand-copy {
      color: #334155;
      font-size: 18px;
      line-height: 1.7;
      margin-top: 18px;
      max-width: 560px;
    }

    .register-box {
      justify-self: center;
      margin: 0;
      width: 100%;
    }

    .register-card {
      border-bottom: 4px solid #1f3f6f;
      border-radius: 16px;
      box-shadow: 0 22px 55px rgba(15, 23, 42, .16);
      overflow: hidden;
    }

    .register-card.card-outline {
      border-top: 3px solid #ed5d17;
    }

    .register-card .card-header {
      background: #ffffff;
    }

    .register-card-body {
      padding-top: .55rem;
    }

    .register-card-logo {
      display: inline-block;
      max-width: 240px;
      width: 100%;
    }

    .register-card-logo img {
      display: block;
      height: auto;
      max-width: 100%;
      width: 100%;
    }

    .register-box-msg {
      color: #1f2937;
      font-size: 16px;
      font-weight: 600;
      margin-top: 6px;
      margin-bottom: 10px;
      text-align: center;
    }

    .btn-register {
      background: #ed5d17;
      border-color: #ed5d17;
      color: #ffffff;
      font-weight: 700;
    }

    .btn-register:hover,
    .btn-register:focus {
      background: #d95312;
      border-color: #d95312;
      color: #ffffff;
    }

    .login-link {
      color: #1f3f6f;
      display: inline-block;
      font-weight: 600;
      margin-top: 16px;
    }

    .register-inline-row {
      margin-left: -6px;
      margin-right: -6px;
    }

    .register-inline-row > [class*="col-"] {
      padding-left: 6px;
      padding-right: 6px;
    }

    .register-footer {
      background: #1f3f6f;
      color: #ffffff;
      flex-shrink: 0;
      margin-top: -38px;
    }

    .register-footer strong {
      color: #ffffff;
    }

    .swal-small {
      font-size: 0.9rem;
    }

    @media (max-width: 991.98px) {
      .register-layout {
        gap: 34px;
        grid-template-columns: 1fr;
        min-height: auto;
        padding: 20px 22px 4px;
      }

      .brand-panel {
        text-align: center;
      }

      .brand-copy {
        margin-left: auto;
        margin-right: auto;
      }

      .register-box {
        max-width: 460px;
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
          <li class="nav-item">
            <a href="{{ route('product') }}" class="nav-link">Product</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper register-content-wrapper">
    <div class="register-layout">
      <div class="brand-panel">
        <h1 class="brand-title">Daftar Akun</h1>
        <div class="brand-subtitle">Sistem Rekomendasi Cat</div>
        <p class="brand-copy">
          Buat akun untuk menggunakan fitur rekomendasi produk cat berdasarkan kategori, sub kategori, lokasi penggunaan, dan kebutuhan produk.
        </p>
      </div>

      <div class="register-box">
        <div class="card card-outline register-card">
          <div class="card-header text-center">
            <a href="{{ route('landing') }}" class="register-card-logo">
              <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo">
            </a>
          </div>

          <div class="card-body register-card-body">
            <p class="register-box-msg">Daftar untuk mulai menggunakan sistem</p>

            <form action="{{ route('register.store') }}" method="POST">
              @csrf

              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama lengkap" value="{{ old('name') }}" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon / WhatsApp" value="{{ old('no_telp') }}" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone-alt"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="text" name="perusahaan_instansi" class="form-control" placeholder="Perusahaan / Instansi" value="{{ old('perusahaan_instansi') }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-building"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="text" name="divisi_jabatan" class="form-control" placeholder="Divisi / Jabatan" value="{{ old('divisi_jabatan') }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-briefcase"></span>
                  </div>
                </div>
              </div>

              <div class="row register-inline-row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="{{ old('provinsi') }}" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-map"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <input type="text" name="kota_kabupaten" class="form-control" placeholder="Kota / Kabupaten" value="{{ old('kota_kabupaten') }}" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-map-marker-alt"></span>
                      </div>
                    </div>
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

              <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-register btn-block">
                <i class="fas fa-user-plus mr-1"></i> Daftar
              </button>
            </form>

            <a href="{{ route('login') }}" class="login-link">
              Sudah punya akun? Masuk
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer text-center register-footer">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  @if(session('register_success'))
  Swal.fire({
    icon: 'success',
    title: 'Register Berhasil',
    text: 'Mengalihkan ke halaman login...',
    timer: 2000,
    showConfirmButton: false,
    timerProgressBar: true,
    customClass: {
      popup: 'swal-small'
    }
  }).then(() => {
    window.location.href = "{{ route('login') }}";
  });
  @endif

  @if ($errors->any())
  Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ $errors->first() }}',
    confirmButtonColor: '#ed5d17',
    customClass: {
      popup: 'swal-small'
    }
  });
  @endif
});
</script>

</body>
</html>
