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

        @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0 pl-3">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Form Edit Produk</h3>
          </div>

          <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
              @php
                $selectedSubKategori = collect(old('sub_kategori', $produk->subKategori->pluck('id_sub_kategori')->all()))->map(fn ($id) => (string) $id)->all();
                $selectedLokasi = collect(old('lokasi_penggunaan', $produk->lokasiPenggunaan->pluck('id_lokasi_penggunaan')->all()))->map(fn ($id) => (string) $id)->all();
                $selectedKebutuhan = collect(old('kelebihan', $produk->kebutuhan->pluck('id_kebutuhan')->all()))->map(fn ($id) => (string) $id)->all();
              @endphp

              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori --</option>
                  @foreach($kategori as $item)
                    <option value="{{ $item->id_kategori }}" {{ (string) old('id_kategori', $produk->id_kategori) === (string) $item->id_kategori ? 'selected' : '' }}>
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
                               {{ in_array((string) $item->id_sub_kategori, $selectedSubKategori, true) ? 'checked' : '' }}>
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
                               {{ in_array((string) $item->id_lokasi_penggunaan, $selectedLokasi, true) ? 'checked' : '' }}>
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
                               {{ in_array((string) $item->id_kebutuhan, $selectedKebutuhan, true) ? 'checked' : '' }}>
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

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
