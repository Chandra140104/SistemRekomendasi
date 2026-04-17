<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Katalog Produk | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    .catalog-page {
      background: #f4f1eb;
      padding-bottom: 30px;
    }

    .catalog-sheet {
      background: #fff;
      border: 1px solid #e6e1d8;
      box-shadow: 0 18px 44px rgba(0, 0, 0, .10);
      margin-bottom: 28px;
    }

    .catalog-search-card {
      border: 0;
      box-shadow: 0 10px 26px rgba(0, 0, 0, .08);
      margin-bottom: 24px;
    }

    .category-title {
      background: #b39478;
      color: #fff;
      font-size: 27px;
      font-weight: 800;
      letter-spacing: 6px;
      margin: 0;
      padding: 15px 20px;
      text-align: center;
      text-transform: uppercase;
    }

    .category-title.category-even {
      background: #27a8df;
    }

    .category-title.category-acrylic {
      background: #f28c28;
    }

    .category-title.category-polyurethane {
      background: #0b3d91;
    }

    .category-title.category-floor {
      background: #198754;
    }

    .category-title.category-anti-fouling {
      background: #8b1e1e;
    }

    .category-title.category-decorative {
      background: #6f42c1;
    }

    .category-title.category-zinc-rich {
      background: #6c757d;
    }

    .catalog-grid {
      padding: 34px 42px 22px;
    }

    .catalog-product {
      display: grid;
      grid-template-columns: 96px 1fr;
      gap: 14px;
      margin-bottom: 34px;
      min-height: 170px;
    }

    .catalog-product-image {
      align-items: flex-start;
      display: flex;
      justify-content: center;
      padding-top: 2px;
    }

    .catalog-icon {
      align-items: center;
      background: linear-gradient(145deg, #0d8d49, #075a32);
      border: 5px solid #f1f1f1;
      border-radius: 16px;
      box-shadow: 0 12px 20px rgba(0, 0, 0, .18);
      color: #f4e72a;
      display: flex;
      height: 84px;
      justify-content: center;
      width: 84px;
    }

    .catalog-icon i {
      font-size: 34px;
    }

    .catalog-product-title {
      color: #03833e;
      font-size: 17px;
      font-weight: 900;
      line-height: 1.1;
      margin-bottom: 2px;
      text-transform: uppercase;
    }

    .catalog-product-code {
      color: #222;
      font-size: 11px;
      font-weight: 700;
      margin-bottom: 2px;
    }

    .catalog-product-sub {
      color: #333;
      font-size: 11px;
      margin-bottom: 5px;
    }

    .catalog-product ul {
      font-size: 11px;
      line-height: 1.35;
      margin: 0;
      padding-left: 16px;
    }

    .catalog-empty-search {
      display: none;
      font-size: 18px;
      font-weight: 700;
      padding: 34px 20px;
      text-align: center;
    }

    @media (max-width: 767.98px) {
      .catalog-grid {
        padding: 24px 18px 8px;
      }

      .category-title {
        font-size: 21px;
        letter-spacing: 3px;
      }

      .catalog-product {
        grid-template-columns: 80px 1fr;
      }

      .catalog-product-title {
        font-size: 15px;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Katalog Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Katalog</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content catalog-page">
    <div class="container-fluid">
      <div class="card catalog-search-card">
        <div class="card-body">
          <label for="catalogSearch" class="mb-2">Cari Nama Produk</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" id="catalogSearch" class="form-control" placeholder="Ketik nama produk, contoh: FOXAPOX">
          </div>
        </div>
      </div>

      <div id="catalogEmptySearch" class="catalog-empty-search">
        Produk tidak tersedia
      </div>

      @forelse($produkByKategori as $namaKategori => $produkList)
      <div class="catalog-sheet" data-catalog-sheet>
        <h2 class="category-title {{ $loop->even ? 'category-even' : '' }} {{ strtolower($namaKategori) === 'acrylic' ? 'category-acrylic' : '' }} {{ strtolower($namaKategori) === 'polyurethane' ? 'category-polyurethane' : '' }} {{ strtolower($namaKategori) === 'floor' ? 'category-floor' : '' }} {{ strtolower($namaKategori) === 'anti fouling' ? 'category-anti-fouling' : '' }} {{ strtolower($namaKategori) === 'decorative' ? 'category-decorative' : '' }} {{ strtolower($namaKategori) === 'zinc rich' ? 'category-zinc-rich' : '' }}">
          {{ $namaKategori }} Coating
        </h2>

        <div class="catalog-grid">
          <div class="row">
            @foreach($produkList as $produk)
            <div class="col-lg-6" data-catalog-product data-product-name="{{ strtolower($produk->nama) }}">
              <div class="catalog-product">
                <div class="catalog-product-image">
                  <div class="catalog-icon" title="{{ $produk->nama }}">
                    <i class="fas fa-fill-drip"></i>
                  </div>
                </div>

                <div>
                  <div class="catalog-product-title">{{ $produk->nama }}</div>
                  <div class="catalog-product-code">OX-{{ str_pad($produk->id_produk, 3, '0', STR_PAD_LEFT) }}</div>
                  <div class="catalog-product-sub">{{ $produk->sub_kategori }}</div>

                  <ul>
                    @foreach(explode(',', $produk->kelebihan ?? '') as $kelebihan)
                      @if(trim($kelebihan) !== '')
                        <li>{{ trim($kelebihan) }}</li>
                      @endif
                    @endforeach

                    @foreach(explode(',', $produk->lokasi_penggunaan ?? '') as $lokasi)
                      @if(trim($lokasi) !== '')
                        <li>Untuk {{ trim($lokasi) }}</li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @empty
      <div class="alert alert-info">
        Belum ada produk yang tersedia untuk ditampilkan pada katalog.
      </div>
      @endforelse
    </div>
  </section>
</div>

<footer class="main-footer text-center">
  <strong>Foxapaint &copy; 2026</strong>
</footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
$(function () {
  const searchInput = $('#catalogSearch');
  const emptySearch = $('#catalogEmptySearch');

  searchInput.on('input', function () {
    const keyword = $(this).val().trim().toLowerCase();
    let visibleProducts = 0;

    $('[data-catalog-sheet]').each(function () {
      const sheet = $(this);
      let visibleInSheet = 0;

      sheet.find('[data-catalog-product]').each(function () {
        const product = $(this);
        const productName = product.data('product-name') || '';
        const isMatch = keyword === '' || productName.includes(keyword);

        product.toggle(isMatch);

        if (isMatch) {
          visibleInSheet++;
          visibleProducts++;
        }
      });

      sheet.toggle(visibleInSheet > 0);
    });

    emptySearch.toggle(keyword !== '' && visibleProducts === 0);
  });
});
</script>
</body>
</html>
