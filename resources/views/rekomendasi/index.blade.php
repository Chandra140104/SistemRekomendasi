<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rekomendasi Produk | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
    .rekomendasi-form-header {
      background-color: #1f3f6f !important;
      border-color: #1f3f6f !important;
    }

    .btn-rekomendasi {
      background-color: #ed5d17;
      border-color: #ed5d17;
      color: #ffffff;
    }

    .btn-rekomendasi:hover,
    .btn-rekomendasi:focus {
      background-color: #d95312;
      border-color: #d95312;
      color: #ffffff;
    }

    .catalog-modal-card {
      display: grid;
      grid-template-columns: 230px 1fr;
      gap: 28px;
      align-items: center;
      padding: 18px;
    }

    .catalog-modal-visual {
      min-height: 260px;
      border-radius: 18px;
      background: linear-gradient(160deg, #f8fafc 0%, #e9f7ef 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .06);
    }

    .catalog-modal-visual i {
      color: #058734;
      font-size: 96px;
      filter: drop-shadow(0 12px 14px rgba(0, 0, 0, .18));
    }

    .catalog-modal-title {
      color: #058734;
      font-size: 26px;
      font-weight: 800;
      letter-spacing: .5px;
      margin-bottom: 2px;
      text-transform: uppercase;
    }

    .catalog-modal-code {
      color: #111827;
      font-size: 15px;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .catalog-attribute-list {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .catalog-attribute-list li {
      border-bottom: 1px solid #edf2f7;
      padding: 10px 0;
    }

    .catalog-attribute-list li:last-child {
      border-bottom: 0;
    }

    .catalog-attribute-label {
      color: #6b7280;
      display: block;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .8px;
      text-transform: uppercase;
    }

    .catalog-attribute-value {
      color: #1f2937;
      font-size: 15px;
      font-weight: 600;
    }

    .hasil-rekomendasi-list {
      display: grid;
      gap: 18px;
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .hasil-rekomendasi-item {
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      display: grid;
      gap: 16px;
      grid-template-columns: 1fr;
      padding: 18px;
    }

    .hasil-rekomendasi-visual {
      display: grid;
      gap: 12px;
    }

    .hasil-rekomendasi-media {
      align-items: center;
      background: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
      border-radius: 12px;
      display: flex;
      justify-content: center;
      min-height: 140px;
      padding: 12px;
    }

    .hasil-rekomendasi-media img {
      height: auto;
      max-width: 100%;
    }

    .hasil-rekomendasi-body {
      min-width: 0;
    }

    .hasil-rekomendasi-name {
      color: #0b4f2f;
      font-size: 20px;
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 6px;
      text-transform: uppercase;
    }

    .hasil-rekomendasi-meta {
      color: #475569;
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .hasil-rekomendasi-grid {
      display: grid;
      gap: 10px;
      grid-template-columns: 1fr;
    }

    .hasil-rekomendasi-field {
      min-width: 0;
    }

    .hasil-rekomendasi-label {
      color: #6b7280;
      display: block;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .8px;
      margin-bottom: 2px;
      text-transform: uppercase;
    }

    .hasil-rekomendasi-value {
      color: #1f2937;
      font-size: 15px;
      font-weight: 600;
      word-break: break-word;
    }

    .hasil-rekomendasi-side {
      display: flex;
      flex-direction: row;
      gap: 12px;
      justify-content: stretch;
      min-width: 0;
    }

    .hasil-rekomendasi-ranking {
      background: #fff7ed;
      border: 1px solid #fdba74;
      border-radius: 10px;
      flex: 1 1 96px;
      padding: 10px 12px;
      text-align: center;
    }

    .hasil-rekomendasi-ranking-label {
      color: #c2410c;
      display: block;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .7px;
      margin-bottom: 4px;
      text-transform: uppercase;
    }

    .hasil-rekomendasi-ranking-value {
      color: #ed5d17;
      font-size: 22px;
      font-weight: 800;
      line-height: 1;
    }

    .hasil-rekomendasi-score {
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      border-radius: 10px;
      flex: 1 1 120px;
      padding: 10px 12px;
      text-align: center;
    }

    .hasil-rekomendasi-score-label {
      color: #166534;
      display: block;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .7px;
      margin-bottom: 4px;
      text-transform: uppercase;
    }

    .hasil-rekomendasi-score-value {
      color: #15803d;
      font-size: 20px;
      font-weight: 800;
      line-height: 1;
    }

    .btn-detail-rekomendasi {
      background-color: #1f3f6f;
      border-color: #1f3f6f;
      color: #ffffff;
      width: 100%;
    }

    .btn-detail-rekomendasi:hover,
    .btn-detail-rekomendasi:focus {
      background-color: #163255;
      border-color: #163255;
      color: #ffffff;
    }

    @media (max-width: 1199.98px) {
      .hasil-rekomendasi-list {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 767.98px) {
      .hasil-rekomendasi-list {
        grid-template-columns: 1fr;
      }

      .hasil-rekomendasi-item {
        grid-template-columns: 1fr;
      }

      .hasil-rekomendasi-side {
        flex-direction: column;
      }

      .catalog-modal-card {
        grid-template-columns: 1fr;
      }

      .catalog-modal-visual {
        min-height: 180px;
      }
    }
  </style>
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
<div class="card-header rekomendasi-form-header">
  <h3 class="card-title">Form Kebutuhan User</h3>
</div>

<form method="POST" action="{{ route('rekomendasi.store') }}">
@csrf

<div class="card-body">

<div class="callout callout-info">
  <h5 class="mb-2">Isi kebutuhan produk terlebih dahulu</h5>
  <p class="mb-0">Pilih kategori, sub kategori, lokasi penggunaan, dan kebutuhan yang diinginkan agar sistem bisa menampilkan produk yang paling sesuai.</p>
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

{{-- KEBUTUHAN --}}
<div class="form-group">
  <label>Kebutuhan *</label>
  <div class="row">
    @foreach($kelebihanOptions as $item)
    <div class="col-md-4">
      <div class="form-check">
        <input
          type="checkbox"
          name="kelebihan[]"
          value="{{ $item }}"
          class="form-check-input"
          id="kelebihan-{{ \Illuminate\Support\Str::slug($item) }}"
          {{ in_array($item, old('kelebihan', [])) ? 'checked' : '' }}
        >
        <label class="form-check-label" for="kelebihan-{{ \Illuminate\Support\Str::slug($item) }}">{{ $item }}</label>
      </div>
    </div>
    @endforeach
  </div>
</div>

</div>

<div class="card-footer text-center">
  <button class="btn btn-rekomendasi px-4">
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
          <th width="25%">Kategori</th>
          <th width="25%">Sub Kategori</th>
          <th width="25%">Lokasi</th>
          <th width="25%">Kebutuhan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($riwayatList as $item)
        <tr>
          <td>{{ $item->kategori }}</td>
          <td>{{ $item->sub_kategori }}</td>
          <td>{{ $item->lokasi_penggunaan }}</td>
          <td>{{ $item->kelebihan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif





{{-- ================= HASIL REKOMENDASI ================= --}}
@if($hasSubmitted ?? false)
<div class="card card-success" id="hasilRekomendasiSection">
  <div class="card-header">
    <h3 class="card-title">Hasil Rekomendasi</h3>
  </div>

  <div class="card-body">
    @if(isset($hasil) && count($hasil))
    <div class="hasil-rekomendasi-list">
      @foreach($hasil as $item)
      <div class="hasil-rekomendasi-item">
        <div class="hasil-rekomendasi-visual">
          <div class="hasil-rekomendasi-side">
            <div class="hasil-rekomendasi-ranking">
              <span class="hasil-rekomendasi-ranking-label">Ranking</span>
              <span class="hasil-rekomendasi-ranking-value">{{ $item['ranking'] }}</span>
            </div>

            <div class="hasil-rekomendasi-score">
              <span class="hasil-rekomendasi-score-label">Kecocokan</span>
              <span class="hasil-rekomendasi-score-value">{{ number_format($item['score'], 4) }}</span>
            </div>
          </div>

          <div class="hasil-rekomendasi-media">
            <img src="{{ asset('images/backgorund/product.png') }}" alt="{{ $item['produk']->nama }}">
          </div>
        </div>

        <div class="hasil-rekomendasi-body">
          <div class="hasil-rekomendasi-name">{{ $item['produk']->nama }}</div>
          <div class="hasil-rekomendasi-meta">OX-{{ str_pad($item['produk']->id_produk, 3, '0', STR_PAD_LEFT) }}</div>

          <div class="hasil-rekomendasi-grid">
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Kategori</span>
              <span class="hasil-rekomendasi-value">{{ $item['produk']->kategori->nama ?? '-' }}</span>
            </div>
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Sub Kategori</span>
              <span class="hasil-rekomendasi-value">{{ $item['produk']->sub_kategori }}</span>
            </div>
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Lokasi Penggunaan</span>
              <span class="hasil-rekomendasi-value">{{ $item['produk']->lokasi_penggunaan }}</span>
            </div>
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Kebutuhan</span>
              <span class="hasil-rekomendasi-value">{{ $item['produk']->kelebihan }}</span>
            </div>
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Perhitungan</span>
              <span class="hasil-rekomendasi-value">n = {{ $item['n'] }}, bi = {{ $item['bi'] }}, bj = {{ $item['bj'] }}</span>
            </div>
            <div class="hasil-rekomendasi-field">
              <span class="hasil-rekomendasi-label">Rumus</span>
              <span class="hasil-rekomendasi-value">Sim = 2 x {{ $item['n'] }} / ({{ $item['bi'] }} + {{ $item['bj'] }})</span>
            </div>
          </div>
        </div>

        <div class="hasil-rekomendasi-side">
          <button class="btn btn-detail-rekomendasi btn-sm"
            data-toggle="modal"
            data-target="#modalShow"
            data-nama="{{ $item['produk']->nama }}"
            data-kode="OX-{{ str_pad($item['produk']->id_produk, 3, '0', STR_PAD_LEFT) }}"
            data-kategori="{{ $item['produk']->kategori->nama ?? '-' }}"
            data-sub-kategori="{{ $item['produk']->sub_kategori }}"
            data-lokasi="{{ $item['produk']->lokasi_penggunaan }}"
            data-kelebihan="{{ $item['produk']->kelebihan }}"
            data-ranking="{{ $item['ranking'] }}"
            data-score="{{ number_format($item['score'], 4) }}">
            <i class="fas fa-eye mr-1"></i> Lihat Detail
          </button>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="alert alert-warning mb-0">
      Tidak ada produk dengan nilai kecocokan minimal {{ number_format($threshold ?? 0.5, 4) }}.
      Silakan ubah pilihan kebutuhan produk untuk mendapatkan rekomendasi.
    </div>
    @endif
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
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title font-weight-bold">Detail Katalog Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="catalog-modal-card">
          <div class="catalog-modal-visual">
            <i class="fas fa-fill-drip"></i>
          </div>
          <div>
            <h3 class="catalog-modal-title" id="modalProdukNama">-</h3>
            <div class="catalog-modal-code" id="modalProdukKode">-</div>
            <ul class="catalog-attribute-list">
              <li>
                <span class="catalog-attribute-label">Kategori</span>
                <span class="catalog-attribute-value" id="modalProdukKategori">-</span>
              </li>
              <li>
                <span class="catalog-attribute-label">Sub Kategori</span>
                <span class="catalog-attribute-value" id="modalProdukSubKategori">-</span>
              </li>
              <li>
                <span class="catalog-attribute-label">Lokasi Penggunaan</span>
                <span class="catalog-attribute-value" id="modalProdukLokasi">-</span>
              </li>
              <li>
                <span class="catalog-attribute-label">Kebutuhan</span>
                <span class="catalog-attribute-value" id="modalProdukKelebihan">-</span>
              </li>
              <li>
                <span class="catalog-attribute-label">Hasil Rekomendasi</span>
                <span class="catalog-attribute-value">
                  Ranking <span id="modalProdukRanking">-</span> dengan kecocokan <span id="modalProdukScore">-</span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
$(function () {
  const shouldScrollToResult = @json($hasSubmitted ?? false);
  const hasilSection = document.getElementById('hasilRekomendasiSection');

  if (shouldScrollToResult && hasilSection) {
    setTimeout(function () {
      hasilSection.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }, 150);
  }
});

$('#modalShow').on('show.bs.modal', function (e) {
  const button = $(e.relatedTarget);

  $('#modalProdukNama').text(button.data('nama') || '-');
  $('#modalProdukKode').text(button.data('kode') || '-');
  $('#modalProdukKategori').text(button.data('kategori') || '-');
  $('#modalProdukSubKategori').text(button.data('sub-kategori') || '-');
  $('#modalProdukLokasi').text(button.data('lokasi') || '-');
  $('#modalProdukKelebihan').text(button.data('kelebihan') || '-');
  $('#modalProdukRanking').text(button.data('ranking') || '-');
  $('#modalProdukScore').text(button.data('score') || '-');
});
</script>

</body>
</html>
