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
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rekomendasi Produk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Rekomendasi Produk</li>
        </ol>
      </div>
    </div>
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

{{-- ================= FORM INPUT ================= --}}
<div class="card card-primary">
<div class="card-header">
  <h3 class="card-title">Form Kebutuhan User</h3>
</div>

<form method="POST" action="{{ route('rekomendasi.store') }}">
@csrf

<div class="card-body">

<div class="callout callout-info">
  <h5 class="mb-2">Isi kebutuhan produk terlebih dahulu</h5>
  <p class="mb-0">Pilih kategori, sub kategori, dan lokasi penggunaan agar sistem bisa menampilkan produk yang paling sesuai.</p>
</div>

{{-- KATEGORI --}}
<div class="form-group">
  <label>Kategori *</label>
  <select name="kategori" class="form-control" required>
    <option value="">-- Pilih --</option>
    @foreach($kategoriOptions as $v)
      <option value="{{ $v }}" {{ old('kategori')==$v?'selected':'' }}>{{ $v }}</option>
    @endforeach
  </select>
</div>

{{-- SUB KATEGORI --}}
<div class="form-group">
  <label>Sub Kategori *</label>
  <select name="sub_kategori" class="form-control" required>
    <option value="">-- Pilih --</option>
    @foreach($subKategoriOptions as $v)
      <option value="{{ $v }}" {{ old('sub_kategori')==$v?'selected':'' }}>{{ $v }}</option>
    @endforeach
  </select>
</div>

{{-- LOKASI --}}
<div class="form-group">
  <label>Lokasi Penggunaan *</label>
  <div class="row">
    @foreach($lokasiOptions as $i)
    <div class="col-md-4">
      <div class="form-check">
        <input
          type="checkbox"
          name="lokasi_penggunaan[]"
          value="{{ $i }}"
          class="form-check-input"
          id="lokasi-{{ \Illuminate\Support\Str::slug($i) }}"
          {{ in_array($i, old('lokasi_penggunaan', [])) ? 'checked' : '' }}
        >
        <label class="form-check-label" for="lokasi-{{ \Illuminate\Support\Str::slug($i) }}">{{ $i }}</label>
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

{{-- ================= RIWAYAT INPUT USER ================= --}}
@if(isset($riwayatList) && $riwayatList->count())
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Riwayat Input User</h3>
  </div>

  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0">
      <thead class="bg-light">
        <tr>
          <th>Kategori</th>
          <th>Sub Kategori</th>
          <th>Lokasi</th>
          <th>Waktu Input</th>
        </tr>
      </thead>
      <tbody>
        @foreach($riwayatList as $item)
        <tr>
          <td>{{ $item->kategori }}</td>
          <td>{{ $item->sub_kategori }}</td>
          <td>{{ $item->lokasi_penggunaan }}</td>
          <td>{{ optional($item->created_at)->format('d-m-Y H:i:s') ?? '-' }}</td>
        </tr>
        @endforeach
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
          <th>Ranking</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Sub</th>
          <th>Lokasi</th>
          <th>Kecocokan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hasil as $item)
        <tr>
          <td><span class="badge badge-primary">{{ $item['ranking'] }}</span></td>
          <td>{{ $item['produk']->nama }}</td>
          <td>{{ $item['produk']->kategori->nama ?? '-' }}</td>
          <td>{{ $item['produk']->sub_kategori }}</td>
          <td>{{ $item['produk']->lokasi_penggunaan }}</td>
          <td>
            <span class="badge badge-success">{{ $item['score'] }}%</span>
            <div class="small text-muted mt-1">
              Kategori {{ $item['kategori_score'] }}%,
              Sub {{ $item['sub_kategori_score'] }}%,
              Lokasi {{ $item['lokasi_score'] }}%
            </div>
          </td>
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
