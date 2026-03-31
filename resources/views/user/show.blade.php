<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title text-white">
      <i class="fas fa-users"></i> Detail Pengguna
    </h5>
  </div>

  <table class="table table-bordered mb-0">
    <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
    <tr><th>Level</th><td>{{ $user->level->nama }}</td></tr>
  </table>

  <div class="card-footer text-right">
    <button class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
  </div>
</div>