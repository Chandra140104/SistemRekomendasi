<div class="card mb-0">
  <div class="card-header bg-info">
    <h5 class="card-title mb-0 text-white">
      <i class="fas fa-box"></i> Detail Produk
    </h5>
  </div>

  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0">

      <!-- Nama -->
      <tr>
        <th width="35%">Nama Produk</th>
        <td>{{ $produk->nama }}</td>
      </tr>

      <!-- Kategori -->
      <tr>
        <th>Kategori</th>
        <td>{{ $produk->kategori->nama ?? '-' }}</td>
      </tr>

      <!-- Sub Kategori -->
      <tr>
        <th>Sub Kategori</th>
        <td>
          @foreach(explode(',', $produk->sub_kategori) as $sub)
            <span class="badge badge-primary">{{ $sub }}</span>
          @endforeach
        </td>
      </tr>

      <!-- Lokasi -->
      <tr>
        <th>Aplikasi</th>
        <td>
          @foreach(explode(',', $produk->lokasi_penggunaan) as $lokasi)
            <span class="badge badge-info">{{ $lokasi }}</span>
          @endforeach
        </td>
      </tr>

      <!-- Kelebihan -->
      <tr>
        <th>Kelebihan</th>
        <td>
          @foreach(explode(',', $produk->kelebihan) as $k)
            <span class="badge badge-success">{{ $k }}</span>
          @endforeach
        </td>
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