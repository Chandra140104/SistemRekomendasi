<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sub Kategori | AdminLTE</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <h1>Data Sub Kategori</h1>
  </div>
</section>

<section class="content">
<div class="container-fluid">

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Sub Kategori</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Sub Kategori</th>
          <th width="160" class="text-center">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach($subKategori as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>

          <td class="text-center">
            <button class="btn btn-info btn-sm"
              data-toggle="modal"
              data-target="#modalShow"
              data-url="{{ route('sub-kategori.show', $item->id_sub_kategori) }}">
              <i class="fas fa-eye"></i>
            </button>

            <a href="{{ route('sub-kategori.edit', $item->id_sub_kategori) }}"
               class="btn btn-warning btn-sm">
              <i class="fas fa-edit"></i>
            </a>

            <form action="{{ route('sub-kategori.destroy', $item->id_sub_kategori) }}"
              method="POST"
              class="d-inline">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger btn-sm btn-delete">
                <i class="fas fa-trash"></i>
              </button>
            </form>
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

<div class="modal fade" id="modalShow">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body" id="modalContent"></div>
    </div>
  </div>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(function () {
  $('#example1').DataTable();

  $('.dataTables_filter').append(`
    <a href="{{ route('sub-kategori.create') }}" class="btn btn-primary btn-sm ml-2">
      <i class="fas fa-plus"></i> Tambah Sub Kategori
    </a>
  `);
});

$('#modalShow').on('show.bs.modal', function (e) {
  let url = $(e.relatedTarget).data('url');
  $('#modalContent').load(url);
});

$(document).on('click', '.btn-delete', function () {
  let form = $(this).closest('form');

  Swal.fire({
    title: 'Yakin hapus?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya!'
  }).then((result) => {
    if (result.isConfirmed) form.submit();
  });
});
</script>

@if(session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{{ session('success') }}'
});
</script>
@endif

</body>
</html>
