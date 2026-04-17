<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Produk | AdminLTE</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.sidebar')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <h1>Edit Produk</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Form Edit Produk</h3>
          </div>

          <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control"
                       value="{{ $produk->nama }}" required>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori --</option>
                  @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}"
                      {{ $produk->id_kategori == $kat->id_kategori ? 'selected' : '' }}>
                      {{ $kat->nama }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Sub Kategori</label>
                <div class="row">
                  @php
                    $subKategoriList = [
                      'Mortar',
                      'Primer 1st',
                      'Primer 2nd',
                      'Finish 3rd',
                      'FInish Matte 3rd',
                      'Finish Gloss 3rd',
                      'Protect 3rd'
                    ];
                  @endphp

                  @foreach($subKategoriList as $sub)
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input"
                             type="checkbox"
                             name="sub_kategori[]"
                             value="{{ $sub }}"
                             id="sub-{{ \Illuminate\Support\Str::slug($sub) }}"
                             {{ in_array($sub, $produk->sub_kategori) ? 'checked' : '' }}>
                      <label class="form-check-label" for="sub-{{ \Illuminate\Support\Str::slug($sub) }}">{{ $sub }}</label>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="form-group">
                <label>Lokasi Penggunaan (Bisa lebih dari satu)</label>
                <div class="row">
                  @php
                    $lokasi = [
                      'Besi Indoor','Besi Outdoor','Beton Indoor','Beton Outdoor',
                      'Lantai Kering','Lantai Basah','Dalam Air'
                    ];
                  @endphp

                  @foreach($lokasi as $l)
                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input"
                             type="checkbox"
                             name="lokasi_penggunaan[]"
                             value="{{ $l }}"
                             id="lokasi-{{ \Illuminate\Support\Str::slug($l) }}"
                             {{ in_array($l, $produk->lokasi_penggunaan) ? 'checked' : '' }}>
                      <label class="form-check-label" for="lokasi-{{ \Illuminate\Support\Str::slug($l) }}">{{ $l }}</label>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="form-group">
                <label>Kelebihan</label>
                <div class="row">
                  @php
                    $kelebihanList = [
                      'Tahan Kimia',
                      'Tahan Gesekan',
                      'Cepat Kering',
                      'Tahan Karat',
                      'Tahan Abrasi',
                      'Tahan Panas',
                      'Tahan Sinar Matahari',
                      'Tahan Cuaca',
                      'Viskositas Rendah',
                      'Tidak Bau Tajam',
                      'Bawah Kapal',
                      'Anti Static'
                    ];
                  @endphp

                  @foreach($kelebihanList as $kelebihan)
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input"
                             type="checkbox"
                             name="kelebihan[]"
                             value="{{ $kelebihan }}"
                             id="kelebihan-{{ \Illuminate\Support\Str::slug($kelebihan) }}"
                             {{ in_array($kelebihan, $produk->kelebihan) ? 'checked' : '' }}>
                      <label class="form-check-label" for="kelebihan-{{ \Illuminate\Support\Str::slug($kelebihan) }}">{{ $kelebihan }}</label>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

            </div>

            <div class="card-footer">
              <a href="{{ route('produk.index') }}" class="btn btn-secondary">
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

  <footer class="main-footer">
    <strong>Foxapaint &copy; 2026</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></cript>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
