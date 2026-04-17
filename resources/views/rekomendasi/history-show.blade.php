<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hasil Riwayat Rekomendasi | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
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

    @media (max-width: 767.98px) {
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
          <h1>Hasil Riwayat Rekomendasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rekomendasi.history') }}">Riwayat Input</a></li>
            <li class="breadcrumb-item active">Hasil</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Input User</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-bordered mb-0">
            <tr>
              <th width="220">Kategori</th>
              <td>{{ $riwayat->kategori }}</td>
            </tr>
            <tr>
              <th>Sub Kategori</th>
              <td>{{ $riwayat->sub_kategori }}</td>
            </tr>
            <tr>
              <th>Lokasi Penggunaan</th>
              <td>{{ $riwayat->lokasi_penggunaan }}</td>
            </tr>
            <tr>
              <th>Kelebihan</th>
              <td>{{ $riwayat->kelebihan }}</td>
            </tr>
            <tr>
              <th>Waktu Input</th>
              <td>{{ optional($riwayat->created_at)->format('d-m-Y H:i:s') ?? '-' }}</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Hasil Rekomendasi</h3>
        </div>

        <div class="card-body">
          @if(count($hasil))
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Ranking</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Sub Kategori</th>
                  <th>Lokasi Penggunaan</th>
                  <th>Kelebihan</th>
                  <th>Kecocokan</th>
                  <th>Perhitungan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hasil as $item)
                <tr>
                  <td>{{ $item['ranking'] }}</td>
                  <td>{{ $item['produk']->nama }}</td>
                  <td>{{ $item['produk']->kategori->nama ?? '-' }}</td>
                  <td>{{ $item['produk']->sub_kategori }}</td>
                  <td>{{ $item['produk']->lokasi_penggunaan }}</td>
                  <td>{{ $item['produk']->kelebihan }}</td>
                  <td><span class="badge badge-success">{{ number_format($item['score'], 4) }}</span></td>
                  <td>
                    <div class="small text-muted">
                      n = {{ $item['n'] }},
                      bi = {{ $item['bi'] }},
                      bj = {{ $item['bj'] }}
                    </div>
                    <div class="small mt-1">
                      Sim = 2 x {{ $item['n'] }} / ({{ $item['bi'] }} + {{ $item['bj'] }})
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm"
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
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div class="alert alert-warning mb-0">
            Tidak ada produk dengan nilai kecocokan minimal {{ number_format($threshold, 4) }}.
          </div>
          @endif
        </div>

        <div class="card-footer">
          <a href="{{ route('rekomendasi.history') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<footer class="main-footer text-center">
  <strong>Foxapaint &copy; 2026</strong>
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
                <span class="catalog-attribute-label">Kelebihan</span>
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
