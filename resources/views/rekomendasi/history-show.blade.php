<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hasil Riwayat Rekomendasi | Foxapaint</title>

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

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
