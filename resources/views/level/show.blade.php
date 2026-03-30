<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title mb-0 text-white">
      <i class="fas fa-user-shield"></i> Detail Level
    </h5>
  </div>

  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0">
      <tr>
        <th width="35%">ID Level</th>
        <td>{{ $level->id_level }}</td>
      </tr>
      <tr>
        <th>Kode</th>
        <td>{{ $level->kode }}</td>
      </tr>
      <tr>
        <th>Nama Level</th>
        <td>{{ $level->nama }}</td>
      </tr>
    </table>
  </div>

  <div class="card-footer text-right">
    <button type="button"
            class="btn btn-secondary btn-sm"
            data-dismiss="modal">
      <i class="fas fa-times"></i> Tutup
    </button>
  </div>
</div>