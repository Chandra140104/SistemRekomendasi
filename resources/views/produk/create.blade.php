<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Produk | AdminLTE</title>

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

              <!-- Kategori (ENUM) -->
              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori --</option>
                  <option value="Acrylic">Acrylic</option>
                  <option value="Alkyd">Alkyd</option>
                  <option value="Epoxy">Epoxy</option>
                  <option value="Polyurethane">Polyurethane</option>
                  <option value="Floor Coating">Floor Coating</option>
                  <option value="Decorative">Decorative</option>
                  <option value="Waterproofing">Waterproofing</option>
                </select>
              </div>

              <!-- Sub Kategori (ENUM) -->
              <div class="form-group">
                <label>Sub Kategori</label>
                <select name="sub_kategori" class="form-control" required>
                  <option value="">-- Pilih Sub Kategori --</option>
                  <option value="Finish">Finish</option>
                  <option value="Primer">Primer</option>
                  <option value="Waterproofing">Waterproofing</option>
                  <option value="Self Leveling">Self Leveling</option>
                  <option value="Antistatic">Antistatic</option>
                  <option value="Anti Slip">Anti Slip</option>
                  <option value="Elastomeric">Elastomeric</option>
                  <option value="Resin">Resin</option>
                </select>
              </div>

              <!-- Base (ENUM) -->
              <div class="form-group">
                <label>Base</label>
                <select name="base" class="form-control" required>
                  <option value="">-- Pilih Base --</option>
                  <option value="Solvent Based">Solvent Based</option>
                  <option value="Water Based">Water Based</option>
                </select>
              </div>

              <!-- Lokasi Penggunaan (SET) -->
              <div class="form-group">
                <label>Lokasi Penggunaan</label>
                <div class="row">
                  @php
                    $lokasi = [
                      'Besi','Tembok','Industri','Kayu','Baja','Lantai',
                      'Galvanis','Tangki','Area Basah','Outdoor',
                      'Atap','Beton','Dinding','Exterior'
                    ];
                  @endphp

                  @foreach($lokasi as $l)
                    <div class="col-md-3">
                      <div class="icheck-primary">
                        <input type="checkbox" name="lokasi_penggunaan[]" value="{{ $l }}" id="lokasi_{{ $loop->index }}">
                        <label for="lokasi_{{ $loop->index }}">{{ $l }}</label>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              <!-- Fungsi -->
              <div class="form-group">
                <label>Fungsi</label>
                <textarea name="fungsi" rows="3" class="form-control" required></textarea>
              </div>

            </div>

            <div class="card-footer">
              <a href="{{ route('produk.index') }}" class="btn btn-secondary">
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
