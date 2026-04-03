<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Produk | AdminLTE</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <h1>Tambah Produk</h1>
  </div>
</section>

<section class="content">
<div class="container-fluid">

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Tambah Produk</h3>
  </div>

  <form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <div class="card-body">

      <!-- Nama -->
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <!-- Kode -->
      <div class="form-group">
        <label>Kode Produk</label>
        <input type="text" name="kode" class="form-control" required>
      </div>

      <!-- 🔥 FIX RELASI KATEGORI -->
      <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
          <option value="">-- Pilih Kategori --</option>

          @foreach($kategori as $k)
            <option value="{{ $k->id_kategori }}">{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>

      <!-- Sub Kategori -->
      <div class="form-group">
        <label>Sub Kategori</label>
        <input type="text" name="sub_kategori" class="form-control" required>
      </div>

      <!-- Base -->
      <div class="form-group">
        <label>Base</label>
        <select name="base" class="form-control" required>
          <option value="">-- Pilih Base --</option>
          <option value="Solvent Based">Solvent Based</option>
          <option value="Water Based">Water Based</option>
        </select>
      </div>

      <!-- Lokasi -->
      <div class="form-group">
        <label>Lokasi Penggunaan</label>

        @php
        $lokasi = ['Indoor','Outdoor','Besi','Beton','Kayu','Air'];
        @endphp

        @foreach($lokasi as $l)
          <div class="form-check">
            <input type="checkbox" name="lokasi_penggunaan[]" value="{{ $l }}">
            <label>{{ $l }}</label>
          </div>
        @endforeach
      </div>

      <!-- Fungsi -->
      <div class="form-group">
        <label>Fungsi</label>
        <textarea name="fungsi" class="form-control" required></textarea>
      </div>

    </div>

    <div class="card-footer">
      <a href="{{ route('produk.index') }}" class="btn btn-secondary">
        Kembali
      </a>

      <button type="submit" class="btn btn-primary float-right">
        Simpan
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

</body>
</html>