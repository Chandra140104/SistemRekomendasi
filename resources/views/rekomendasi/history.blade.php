<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Riwayat Input | Foxapaint</title>

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
          <h1>Riwayat Input</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Riwayat Input</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">List Riwayat Input Rekomendasi</h3>
        </div>

        <div class="card-body">
          @if($riwayatList->count())
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Sub Kategori</th>
                  <th>Lokasi Penggunaan</th>
                  <th>Kelebihan</th>
                  <th>Waktu Input</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($riwayatList as $riwayat)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $riwayat->kategori }}</td>
                  <td>{{ $riwayat->sub_kategori }}</td>
                  <td>{{ $riwayat->lokasi_penggunaan }}</td>
                  <td>{{ $riwayat->kelebihan }}</td>
                  <td>{{ optional($riwayat->created_at)->format('d-m-Y H:i:s') ?? '-' }}</td>
                  <td class="text-center">
                    <a href="{{ route('rekomendasi.history.show', $riwayat->id_input) }}" class="btn btn-info btn-sm">
                      <i class="fas fa-eye"></i> Lihat Hasil
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div class="alert alert-info mb-0">
            Belum ada riwayat input rekomendasi.
          </div>
          @endif
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
