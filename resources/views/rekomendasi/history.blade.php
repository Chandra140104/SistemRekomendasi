<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Riwayat Input | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
    .rekomendasi-header {
      background-color: #1f3f6f !important;
      border-color: #1f3f6f !important;
      color: #ffffff !important;
    }

    .pagination .page-item.active .page-link {
      background-color: #ed5d17;
      border-color: #ed5d17;
      color: #ffffff;
    }

    .pagination .page-link {
      color: #1f3f6f;
    }

    .pagination .page-link:hover {
      color: #163255;
    }

    .btn-riwayat-hasil {
      background-color: #274f8a;
      border-color: #274f8a;
      color: #ffffff;
    }

    .btn-riwayat-hasil:hover,
    .btn-riwayat-hasil:focus {
      background-color: #1f3f6f;
      border-color: #1f3f6f;
      color: #ffffff;
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
          <h1>Riwayat Input</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Riwayat Input</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-info">
        <div class="card-header rekomendasi-header">
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
                  <th>Kebutuhan</th>
                  <th>Waktu Input</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($riwayatList as $riwayat)
                <tr>
                  <td>{{ $riwayatList->firstItem() + $loop->index }}</td>
                  <td>{{ $riwayat->kategori }}</td>
                  <td>{{ $riwayat->sub_kategori }}</td>
                  <td>{{ $riwayat->lokasi_penggunaan }}</td>
                  <td>{{ $riwayat->kelebihan }}</td>
                  <td>{{ optional($riwayat->created_at)->format('d-m-Y H:i:s') ?? '-' }}</td>
                  <td class="text-center">
                    <a href="{{ route('rekomendasi.history.show', $riwayat->id_input) }}" class="btn btn-riwayat-hasil btn-sm">
                      <i class="fas fa-eye"></i> Lihat Hasil
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex flex-wrap justify-content-between align-items-center mt-3">
            <div class="text-muted">
              Showing {{ $riwayatList->firstItem() }} to {{ $riwayatList->lastItem() }} of {{ $riwayatList->total() }} entries
            </div>
            <div>
              {{ $riwayatList->links('pagination::bootstrap-4') }}
            </div>
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
