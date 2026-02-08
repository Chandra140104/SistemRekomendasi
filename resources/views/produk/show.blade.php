<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title mb-0 text-white">
      <i class="fas fa-box"></i> Detail Produk
    </h5>
  </div>

  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0">
      <tr>
        <th width="35%">Nama Produk</th>
        <td>{{ $produk->nama }}</td>
      </tr>
      <tr>
        <th>Kode</th>
        <td>{{ $produk->kode }}</td>
      </tr>
      <tr>
        <th>Kategori</th>
        <td>{{ $produk->kategori }}</td>
      </tr>
      <tr>
        <th>Sub Kategori</th>
        <td>{{ $produk->sub_kategori }}</td>
      </tr>
      <tr>
        <th>Base</th>
        <td>{{ $produk->base }}</td>
      </tr>
      <tr>
        <th>Aplikasi</th>
        <td>{{ $produk->lokasi_penggunaan }}</td>
      </tr>
      <tr>
        <th>Fungsi</th>
        <td>{{ $produk->fungsi }}</td>
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
