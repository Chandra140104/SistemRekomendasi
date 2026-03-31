<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Pengguna | AdminLTE</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.sidebar')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <h1>Tambah Pengguna</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Pengguna</h3>
          </div>

          <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="card-body">

              <!-- NAMA -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <!-- PASSWORD -->
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <!-- LEVEL -->
              <div class="form-group">
                <label>Level</label>
                <select name="id_level" class="form-control" required>
                  <option value="">-- Pilih Level --</option>
                  @foreach($levels as $l)
                    <option value="{{ $l->id_level }}">{{ $l->nama }}</option>
                  @endforeach
                </select>
              </div>

            </div>

            <div class="card-footer">
              <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>

              <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save"></i> Simpan
              </button>
            </div>

          </form>
        </div>

      </div>
    </section>

  </div>

  <footer class="main-footer">
    <strong>Foxapaint &copy; 2026</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>