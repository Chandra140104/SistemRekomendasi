<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rekomendasi Produk | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <h1>Rekomendasi Produk Cat</h1>
  </div>
</section>

<section class="content">
<div class="container-fluid">

{{-- ================= FORM INPUT ================= --}}
<div class="card card-primary">
<div class="card-header">
  <h3 class="card-title">Input Kebutuhan</h3>
</div>

<form method="POST" action="{{ route('rekomendasi.store') }}">
@csrf

<div class="card-body">

{{-- KATEGORI --}}
<div class="form-group">
  <label>Kategori *</label>
  <select name="kategori" class="form-control" required>
    <option value="">-- Pilih --</option>
    @foreach(['Acrylic','Alkyd','Epoxy','Polyurethane','Floor Coating','Decorative','Waterproofing'] as $v)
      <option value="{{ $v }}" {{ old('kategori')==$v?'selected':'' }}>{{ $v }}</option>
    @endforeach
  </select>
</div>

{{-- SUB KATEGORI --}}
<div class="form-group">
  <label>Sub Kategori *</label>
  <select name="sub_kategori" class="form-control" required>
    <option value="">-- Pilih --</option>
    @foreach(['Finish','Primer','Waterproofing','Self Leveling','Antistatic','Anti Slip','Elastomeric','Resin'] as $v)
      <option value="{{ $v }}" {{ old('sub_kategori')==$v?'selected':'' }}>{{ $v }}</option>
    @endforeach
  </select>
</div>

{{-- BASE --}}
<div class="form-group">
  <label>Base *</label>
  <select name="base" class="form-control" required>
    <option value="">-- Pilih --</option>
    <option value="Solvent Based">Solvent Based</option>
    <option value="Water Based">Water Based</option>
  </select>
</div>

{{-- LOKASI --}}
<div class="form-group">
  <label>Lokasi Penggunaan *</label>
  <div class="row">
    @foreach(['Besi','Tembok','Industri','Kayu','Baja','Lantai','Galvanis','Tangki','Area Basah','Outdoor','Atap','Beton','Dinding','Exterior'] as $i)
    <div class="col-md-4">
      <div class="form-check">
        <input type="checkbox" name="lokasi_penggunaan[]" value="{{ $i }}" class="form-check-input">
        <label class="form-check-label">{{ $i }}</label>
      </div>
    </div>
    @endforeach
  </div>
</div>

</div>

<div class="card-footer text-center">
  <button class="btn btn-primary px-4">
    <i class="fas fa-search"></i> Cari Rekomendasi
  </button>
</div>

</form>
</div>

{{-- ================= RIWAYAT INPUT TERAKHIR ================= --}}
@if(isset($riwayat) && $riwayat)
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Riwayat Input Terakhir</h3>
  </div>

  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0">
      <thead class="bg-light">
        <tr>
          <th>Kategori</th>
          <th>Sub Kategori</th>
          <th>Base</th>
          <th>Lokasi</th>
          <th>Waktu Input</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $riwayat->kategori }}</td>
          <td>{{ $riwayat->sub_kategori }}</td>
          <td>{{ $riwayat->base }}</td>
          <td>{{ $riwayat->lokasi_penggunaan }}</td>
          <td>{{ $riwayat->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endif





{{-- ================= HASIL REKOMENDASI ================= --}}
@if(isset($hasil) && count($hasil))
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Hasil Rekomendasi</h3>
  </div>

  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Sub</th>
          <th>Base</th>
          <th>Lokasi</th>
          <th>Kecocokan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hasil as $item)
        <tr>
          <td>{{ $item['produk']->nama }}</td>
          <td>{{ $item['produk']->kategori }}</td>
          <td>{{ $item['produk']->sub_kategori }}</td>
          <td>{{ $item['produk']->base }}</td>
          <td>{{ $item['produk']->lokasi_penggunaan }}</td>
          <td><span class="badge badge-success">{{ $item['score'] }}%</span></td>
          <td>
            <button class="btn btn-info btn-sm"
              data-toggle="modal"
              data-target="#modalShow"
              data-url="{{ route('produk.show', $item['produk']->id_produk) }}">
              <i class="fas fa-eye"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif

</div>
</section>
</div>

<footer class="main-footer text-center">
  <strong>Foxapaint © 2026</strong>
</footer>
</div>

{{-- MODAL --}}
<div class="modal fade" id="modalShow">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="modalContent"></div>
    </div>
  </div>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
$('#modalShow').on('show.bs.modal', function (e) {
  $('#modalContent').load($(e.relatedTarget).data('url'));
});
</script>

</body>
</html>
