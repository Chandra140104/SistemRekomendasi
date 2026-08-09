<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Pengguna | AdminLTE</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.sidebar')

  <div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Tambah Pengguna</h1>
      </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Pengguna</h3>
          </div>

          <!-- 🔥 ERROR VALIDASI -->
          @if ($errors->any())
          <div class="alert alert-danger m-3">
              <strong>Terjadi kesalahan!</strong>
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif

          <!-- FORM -->
          <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="card-body">

              <!-- NAMA -->
              <div class="form-group">
                <label>Nama</label>
                <input 
                  type="text" 
                  name="name" 
                  class="form-control" 
                  value="{{ old('name') }}"
                  required>
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label>Email</label>
                <input 
                  type="email" 
                  name="email" 
                  class="form-control"
                  value="{{ old('email') }}"
                  required>
              </div>

              <!-- NO TELP -->
              <div class="form-group">
                <label>No. Telepon / WhatsApp</label>
                <input
                  type="text"
                  name="no_telp"
                  class="form-control"
                  value="{{ old('no_telp') }}"
                  required>
              </div>

              <!-- PERUSAHAAN -->
              <div class="form-group">
                <label>Perusahaan / Instansi</label>
                <input
                  type="text"
                  name="perusahaan_instansi"
                  class="form-control"
                  value="{{ old('perusahaan_instansi') }}">
              </div>

              <!-- DIVISI -->
              <div class="form-group">
                <label>Divisi / Jabatan</label>
                <input
                  type="text"
                  name="divisi_jabatan"
                  class="form-control"
                  value="{{ old('divisi_jabatan') }}">
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <input
                      type="text"
                      name="provinsi"
                      class="form-control"
                      value="{{ old('provinsi') }}"
                      required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kota / Kabupaten</label>
                    <input
                      type="text"
                      name="kota_kabupaten"
                      class="form-control"
                      value="{{ old('kota_kabupaten') }}"
                      required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Lokasi Kota</label>
                <input
                  type="text"
                  class="form-control"
                  value="{{ old('lokasi_kota') }}"
                  placeholder="Akan terbentuk otomatis dari Provinsi dan Kota / Kabupaten"
                  readonly>
                <small class="text-muted">Field ini tersimpan otomatis ke kolom <code>lokasi_kota</code>.</small>
              </div>

              <!-- PASSWORD -->
              <div class="form-group">
                <label>Password</label>
                <input 
                  type="password" 
                  name="password" 
                  class="form-control"
                  required>
              </div>

              <!-- LEVEL -->
              <div class="form-group">
                <label>Level</label>
                <select name="id_level" class="form-control" required>
                  <option value="" disabled {{ old('id_level') ? '' : 'selected' }}>
                    -- Pilih Level --
                  </option>

                  @foreach($levels as $l)
                    <option 
                      value="{{ $l->id_level }}"
                      {{ old('id_level') == $l->id_level ? 'selected' : '' }}>
                      {{ $l->nama }}
                    </option>
                  @endforeach
                </select>
              </div>

            </div>

            <!-- FOOTER -->
            <div class="card-footer">

              <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>

              <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save"></i> Simpan
              </button>

            </div>

          </form>
        </div>

      </div>
    </section>

  </div>

  <!-- FOOTER -->
  <footer class="main-footer">
    <strong>Foxapaint &copy; 2026</strong>
  </footer>

</div>

<!-- JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
