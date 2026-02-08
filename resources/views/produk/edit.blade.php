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
                <label>Kode Produk</label>
                <input type="text" name="kode" class="form-control"
                       value="{{ $produk->kode }}" required>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                  @foreach(['Acrylic','Alkyd','Epoxy','Polyurethane','Floor Coating','Decorative','Waterproofing'] as $kat)
                    <option value="{{ $kat }}"
                      {{ $produk->kategori == $kat ? 'selected' : '' }}>
                      {{ $kat }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Sub Kategori</label>
                <select name="sub_kategori" class="form-control" required>
                  @foreach(['Finish','Primer','Waterproofing','Self Leveling','Antistatic','Anti Slip','Elastomeric','Resin'] as $sub)
                    <option value="{{ $sub }}"
                      {{ $produk->sub_kategori == $sub ? 'selected' : '' }}>
                      {{ $sub }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Base</label>
                <select name="base" class="form-control" required>
                  <option value="Solvent Based" {{ $produk->base == 'Solvent Based' ? 'selected' : '' }}>Solvent Based</option>
                  <option value="Water Based" {{ $produk->base == 'Water Based' ? 'selected' : '' }}>Water Based</option>
                </select>
              </div>

              <div class="form-group">
                <label>Aplikasi (Bisa lebih dari satu)</label>
                <div class="row">
                  @php
                    $lokasi = [
                      'Besi','Tembok','Industri','Kayu','Baja','Lantai','Galvanis',
                      'Tangki','Area Basah','Outdoor','Atap','Beton','Dinding','Exterior'
                    ];
                  @endphp

                  @foreach($lokasi as $l)
                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input"
                             type="checkbox"
                             name="lokasi_penggunaan[]"
                             value="{{ $l }}"
                             {{ in_array($l, $produk->lokasi_penggunaan) ? 'checked' : '' }}>
                      <label class="form-check-label">{{ $l }}</label>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="form-group">
                <label>Fungsi</label>
                <textarea name="fungsi" rows="3" class="form-control" required>{{ $produk->fungsi }}</textarea>
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
