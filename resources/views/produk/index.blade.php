<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Produk | AdminLTE</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.sidebar')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <h1>Data Produk</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Produk Foxapaint</h3>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="50">No</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Aplikasi</th>
                  <th width="160" class="text-center">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach($produk as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->kategori }}</td>
                  <td>{{ $p->lokasi_penggunaan }}</td>

                  <td class="text-center">

                    <!-- SHOW -->
                    <button
                      class="btn btn-info btn-sm"
                      data-toggle="modal"
                      data-target="#modalShow"
                      data-url="{{ route('produk.show', $p->id_produk) }}">
                      <i class="fas fa-eye"></i>
                    </button>

                    <!-- EDIT (✅ DITAMBAHKAN & DIPERBAIKI) -->
                    <a href="{{ route('produk.edit', $p->id_produk) }}"
                       class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>

                    <!-- DELETE -->
                    <form action="{{ route('produk.destroy', $p->id_produk) }}"
                          method="POST"
                          class="d-inline delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="button"
                              class="btn btn-danger btn-sm btn-delete">
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

<!-- MODAL SHOW -->
<div class="modal fade" id="modalShow">
  <div class="modal-dialog modal-lg">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTable Init + Tombol Create -->
<script>
$(function () {
  $('#example1').DataTable({
    responsive: true,
    autoWidth: false,
    dom:
      "<'row mb-2'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row mt-2'<'col-sm-5'i><'col-sm-7'p>>"
  });

  // Tambah tombol Create di sebelah Search
  $('.dataTables_filter').append(`
    <a href="{{ route('produk.create') }}"
       class="btn btn-primary btn-sm ml-2">
      <i class="fas fa-plus"></i> Tambah Produk
    </a>
  `);
});
</script>

<!-- Modal Show -->
<script>
$('#modalShow').on('show.bs.modal', function (e) {
  let url = $(e.relatedTarget).data('url');
  $('#modalContent').load(url);
});
</script>

<!-- SweetAlert Delete -->
<script>
$(document).on('click', '.btn-delete', function () {
  let form = $(this).closest('form');

  Swal.fire({
    title: 'Yakin hapus?',
    text: 'Data produk akan dihapus permanen!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  });
});
</script>

<!-- SweetAlert Success -->
@if(session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{{ session('success') }}',
  timer: 2000,
  showConfirmButton: false
});
</script>
@endif

</body>
</html>
