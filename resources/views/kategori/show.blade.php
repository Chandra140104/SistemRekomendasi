<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title text-white">
      <i class="fas fa-tag"></i> Detail Kategori
    </h5>
  </div>

  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th width="40%">Nama Kategori</th>
        <td>{{ $kategori->nama }}</td>
      </tr>
    </table>
  </div>

  <div class="card-footer text-right">
    <button class="btn btn-secondary btn-sm" data-dismiss="modal">
      Tutup
    </button>
  </div>
</div>