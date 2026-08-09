<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password | Sistem Rekomendasi Cat</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-logo">
    <a href="{{ route('landing') }}">
      <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara" style="max-width: 280px; width: 100%; height: auto;">
    </a>
  </div>

  <div class="card card-outline" style="border-top: 3px solid #ed5d17; border-bottom: 3px solid #1f3f68; border-radius: 16px; overflow: hidden;">
    <div class="card-body login-card-body">

      <p class="login-box-msg">
        Masukkan email terdaftar, password baru, dan konfirmasi password baru.
      </p>

      <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback d-block">{{ $message }}</span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password baru" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback d-block">{{ $message }}</span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password baru" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-block text-white" style="background-color: #1f3f68; border-color: #1f3f68;">
              Simpan Password Baru
            </button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>

      <p class="mb-0">
        <a href="{{ route('register') }}">Daftar akun baru</a>
      </p>

    </div>
  </div>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

@if($errors->any())
<script>
Swal.fire({
  icon: 'error',
  title: 'Gagal',
  text: 'Periksa kembali email atau password baru yang Anda masukkan.'
});
</script>
@endif

</body>
</html>
