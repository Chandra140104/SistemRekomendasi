<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title text-white">
      <i class="fas fa-users"></i> Detail Pengguna
    </h5>
  </div>

  <table class="table table-bordered mb-0">
    <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
    <tr><th>No. Telepon / WhatsApp</th><td>{{ $user->no_telp ?? '-' }}</td></tr>
    <tr><th>Perusahaan / Instansi</th><td>{{ $user->perusahaan_instansi ?? '-' }}</td></tr>
    <tr><th>Divisi / Jabatan</th><td>{{ $user->divisi_jabatan ?? '-' }}</td></tr>
    <tr><th>Provinsi</th><td>{{ $user->provinsi ?? '-' }}</td></tr>
    <tr><th>Kota / Kabupaten</th><td>{{ $user->kota_kabupaten ?? '-' }}</td></tr>
    <tr><th>Lokasi Kota</th><td>{{ $user->lokasi_kota ?? '-' }}</td></tr>
    <tr><th>Level</th><td>{{ $user->level->nama }}</td></tr>
  </table>

  <div class="card-footer text-right">
    <button class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
  </div>
</div>
