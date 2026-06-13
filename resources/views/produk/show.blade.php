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
          @forelse ($produk->sub_kategori_labels as $item)
            <span class="badge badge-primary mr-1">{{ $item }}</span>
          @empty
            -
          @endforelse
        </td>
      </tr>

      <!-- Lokasi -->
      <tr>
        <th>Lokasi Penggunaan</th>
        <td>
          @forelse ($produk->lokasi_penggunaan_labels as $item)
            <span class="badge badge-info mr-1">{{ $item }}</span>
          @empty
            -
          @endforelse
        </td>
      </tr>

      <!-- Kebutuhan -->
      <tr>
        <th>Kebutuhan</th>
        <td>
          @forelse ($produk->kebutuhan_labels as $item)
            <span class="badge badge-success mr-1">{{ $item }}</span>
          @empty
            -
          @endforelse
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
