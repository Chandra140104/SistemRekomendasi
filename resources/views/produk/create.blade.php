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

@if($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0 pl-3">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Tambah Produk</h3>
  </div>

  <form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <div class="card-body">
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
          <option value="">-- Pilih Kategori --</option>
          @foreach($kategori as $item)
            <option value="{{ $item->id_kategori }}" {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
              {{ $item->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Sub Kategori</label>
        <div class="row">
          @foreach($subKategoriOptions as $item)
            <div class="col-md-4">
              <div class="form-check mb-2">
                <input class="form-check-input"
                       type="checkbox"
                       name="sub_kategori[]"
                       value="{{ $item->id_sub_kategori }}"
                       id="sub-kategori-{{ $item->id_sub_kategori }}"
                       {{ in_array($item->id_sub_kategori, old('sub_kategori', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="sub-kategori-{{ $item->id_sub_kategori }}">
                  {{ $item->nama }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="form-group">
        <label>Lokasi Penggunaan</label>
        <div class="row">
          @foreach($lokasiOptions as $item)
            <div class="col-md-4">
              <div class="form-check mb-2">
                <input class="form-check-input"
                       type="checkbox"
                       name="lokasi_penggunaan[]"
                       value="{{ $item->id_lokasi_penggunaan }}"
                       id="lokasi-{{ $item->id_lokasi_penggunaan }}"
                       {{ in_array($item->id_lokasi_penggunaan, old('lokasi_penggunaan', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="lokasi-{{ $item->id_lokasi_penggunaan }}">
                  {{ $item->nama }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="form-group">
        <label>Kebutuhan</label>
        <div class="row">
          @foreach($kebutuhanOptions as $item)
            <div class="col-md-4">
              <div class="form-check mb-2">
                <input class="form-check-input"
                       type="checkbox"
                       name="kelebihan[]"
                       value="{{ $item->id_kebutuhan }}"
                       id="kebutuhan-{{ $item->id_kebutuhan }}"
                       {{ in_array($item->id_kebutuhan, old('kelebihan', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="kebutuhan-{{ $item->id_kebutuhan }}">
                  {{ $item->nama }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>

    <div class="card-footer">
      <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
      <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
