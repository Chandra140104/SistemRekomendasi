<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Kategori | AdminLTE</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">

  <!-- HEADER -->
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Kategori</h1>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="content">
    <div class="container-fluid">

      <div class="card card-warning">

        <!-- HEADER CARD -->
        <div class="card-header">
          <h3 class="card-title">Form Edit Kategori</h3>
        </div>

        <!-- 🔥 ERROR VALIDASI -->
        @if ($errors->any())
        <div class="alert alert-danger m-3">
          <strong>Terjadi kesalahan!</strong>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card-body">

            <!-- NAMA KATEGORI -->
            <div class="form-group">
              <label>Nama Kategori</label>
              <input 
                type="text" 
                name="nama" 
                class="form-control"
                value="{{ old('nama', $kategori->nama) }}"
                required>
            </div>

          </div>

          <!-- FOOTER -->
          <div class="card-footer">

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <button type="submit" class="btn btn-warning float-right">
              <i class="fas fa-save"></i> Update
            </button>

          </div>

        </form>
      </div>

    </div>
  </section>

</div>

<!-- FOOTER -->
<footer class="main-footer">
  <strong>Foxapaint &copy; 2026</strong>
</footer>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>