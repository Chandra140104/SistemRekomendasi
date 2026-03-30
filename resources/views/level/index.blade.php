<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Level | AdminLTE</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.sidebar')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <h1>Data Level</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Level User</h3>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="50">No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th width="120" class="text-center">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach($levels as $level)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $level->kode }}</td>
                  <td>{{ $level->nama }}</td>

                  <td class="text-center">

                    <!-- SHOW -->
                    <button
                      class="btn btn-info btn-sm"
                      data-toggle="modal"
                      data-target="#modalShow"
                      data-url="{{ route('level.show', $level->id_level) }}">
                      <i class="fas fa-eye"></i>
                    </button>

                    <!-- EDIT -->
                    <a href="{{ route('level.edit', $level->id_level) }}"
                       class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>

                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>

      </div>
    </section>
  </div>

  <footer class="main-footer">
    <strong>Foxapaint &copy; 2026</strong>
  </footer>
</div>

<!-- MODAL SHOW -->
<div class="modal fade" id="modalShow">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body" id="modalContent"></div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- DataTable -->
<script>
$(function () {
  $('#example1').DataTable({
    responsive: true,
    autoWidth: false
  });
});
</script>

<!-- Modal Show -->
<script>
$('#modalShow').on('show.bs.modal', function (e) {
  let url = $(e.relatedTarget).data('url');
  $('#modalContent').load(url);
});
</script>

</body>
</html>