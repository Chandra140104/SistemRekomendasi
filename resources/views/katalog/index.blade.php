<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Katalog Produk | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    .catalog-preview {
      margin: 0 0 36px;
      max-width: none;
      padding: 0;
    }

    .catalog-preview-bar {
      background: #ffffff;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, .10);
      display: flex;
      gap: 10px;
      margin-bottom: 22px;
      overflow-x: auto;
      padding: 10px;
      scrollbar-width: thin;
    }

    .catalog-preview-bar::-webkit-scrollbar {
      height: 8px;
    }

    .catalog-preview-bar::-webkit-scrollbar-thumb {
      background: rgba(148, 163, 184, .7);
      border-radius: 999px;
    }

    .catalog-preview-chip {
      align-items: center;
      background: transparent;
      border: 0;
      border-radius: 14px;
      color: #475569;
      cursor: pointer;
      display: inline-flex;
      flex: 0 0 auto;
      font-size: 16px;
      font-weight: 600;
      justify-content: center;
      min-height: 56px;
      min-width: 150px;
      padding: 12px 18px;
      text-align: center;
      transition: .2s ease-in-out;
    }

    .catalog-preview-chip:focus {
      outline: none;
    }

    .catalog-preview-chip:hover {
      color: #1f3f6f;
    }

    .catalog-preview-chip.active {
      background: #ffffff;
      box-shadow: 0 6px 18px rgba(15, 23, 42, .10);
      color: #1f3f6f;
      position: relative;
    }

    .catalog-preview-chip.active::after {
      background: #ed5d17;
      border-radius: 999px;
      bottom: 8px;
      content: "";
      height: 3px;
      left: 50%;
      position: absolute;
      transform: translateX(-50%);
      width: 42px;
    }

    .catalog-search-box {
      align-items: center;
      background: #ffffff;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
      color: #64748b;
      display: flex;
      gap: 12px;
      min-height: 60px;
      margin-bottom: 22px;
      padding: 0 18px;
    }

    .catalog-search-box i {
      color: #475569;
      font-size: 18px;
    }

    .catalog-search-input {
      background: transparent;
      border: 0;
      color: #1f2937;
      flex: 1;
      font-size: 17px;
    }

    .catalog-search-input:focus {
      outline: none;
    }

    .catalog-product-grid {
      display: grid;
      gap: 22px;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      margin-top: 20px;
    }

    .catalog-product-card {
      background: #ffffff;
      border-radius: 18px;
      box-shadow: 0 16px 36px rgba(15, 23, 42, .10);
      display: flex;
      gap: 18px;
      min-height: 100%;
      padding: 18px;
    }

    .catalog-product-card.hidden {
      display: none;
    }

    .catalog-product-media {
      align-items: center;
      background: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
      border-radius: 16px;
      display: flex;
      flex: 0 0 118px;
      justify-content: center;
      min-height: 140px;
      padding: 12px;
    }

    .catalog-product-media img {
      height: auto;
      max-width: 100%;
    }

    .catalog-product-body {
      min-width: 0;
    }

    .catalog-product-category {
      color: #f59e0b;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: 1px;
      margin-bottom: 6px;
      text-transform: uppercase;
    }

    .catalog-product-name {
      color: #0b4f2f;
      font-size: 22px;
      font-weight: 800;
      line-height: 1.2;
      margin: 0 0 8px;
      text-transform: uppercase;
    }

    .catalog-product-details {
      color: #334155;
      margin: 0;
      padding-left: 18px;
    }

    .catalog-product-details li {
      margin-bottom: 4px;
    }

    .catalog-product-empty {
      color: #64748b;
      display: none;
      font-size: 18px;
      font-weight: 600;
      margin-top: 20px;
      text-align: center;
    }

    .catalog-preview-meta {
      color: #64748b;
      font-size: 16px;
      margin-top: 14px;
    }

    .catalog-page {
      background: #ffffff;
      padding-bottom: 30px;
    }

    .catalog-page .container-fluid {
      padding-left: 12px;
      padding-right: 12px;
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
      .catalog-preview {
        margin-bottom: 28px;
      }

      .catalog-product-grid {
        grid-template-columns: 1fr;
      }

      .catalog-product-card {
        flex-direction: column;
      }

      .catalog-product-media {
        flex-basis: auto;
      }

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
            <li class="breadcrumb-item active">Katalog</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content catalog-page">
    <div class="container-fluid">
      <section class="catalog-preview" id="katalog-cat">
        <div class="catalog-preview-bar">
          <button type="button" class="catalog-preview-chip active" data-filter="Semua">Semua</button>
          @foreach (($kategoriLanding ?? collect()) as $kategori)
            <button type="button" class="catalog-preview-chip" data-filter="{{ $kategori }}">{{ $kategori }}</button>
          @endforeach
        </div>

        <div class="catalog-search-box">
          <i class="fas fa-search"></i>
          <input type="text"
                 class="catalog-search-input"
                 id="catalogSearchInput"
                placeholder="cari produk cat">
        </div>

        <div class="catalog-preview-meta">{{ $totalProdukLanding ?? 0 }} produk</div>

        <div class="catalog-product-grid" id="catalogProductGrid">
          @foreach (($produkLanding ?? collect()) as $produk)
            @php
              $detailItems = array_filter([
                  $produk->sub_kategori,
                  $produk->lokasi_penggunaan,
                  $produk->kelebihan,
              ]);
            @endphp
            <article class="catalog-product-card"
                     data-kategori="{{ $produk->kategori->nama ?? '' }}"
                     data-search="{{ strtolower(trim($produk->nama ?? '')) }}">
              <div class="catalog-product-media">
                <img src="{{ asset('images/backgorund/product.png') }}" alt="{{ $produk->nama }}">
              </div>
              <div class="catalog-product-body">
                <div class="catalog-product-category">{{ $produk->kategori->nama ?? 'Tanpa Kategori' }}</div>
                <h3 class="catalog-product-name">{{ $produk->nama }}</h3>
                @if (!empty($produk->kode))
                  <div class="catalog-product-code">{{ $produk->kode }}</div>
                @endif
                <ul class="catalog-product-details">
                  @foreach ($detailItems as $detail)
                    <li>{{ $detail }}</li>
                  @endforeach
                </ul>
              </div>
            </article>
          @endforeach
        </div>

        <div class="catalog-product-empty" id="catalogProductEmpty">Produk tidak tersedia</div>
      </section>
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
  const landingSearchInput = document.getElementById('catalogSearchInput');

  if (landingSearchInput) {
    const filterButtons = Array.from(document.querySelectorAll('.catalog-preview-chip'));
    const productCards = Array.from(document.querySelectorAll('.catalog-product-card'));
    const emptyState = document.getElementById('catalogProductEmpty');
    const meta = document.querySelector('.catalog-preview-meta');
    const totalProduk = {{ $totalProdukLanding ?? 0 }};
    let activeFilter = 'Semua';

    const updateMeta = (visibleCount) => {
      meta.textContent = visibleCount + ' produk';
    };

    const applyFilter = () => {
      const searchTerm = (landingSearchInput.value || '').trim().toLowerCase();
      let visibleCount = 0;

      productCards.forEach((card) => {
        const kategori = card.dataset.kategori || '';
        const searchableText = card.dataset.search || '';
        const matchesFilter = activeFilter === 'Semua' || kategori === activeFilter;
        const matchesSearch = searchTerm === '' || searchableText.includes(searchTerm);
        const shouldShow = matchesFilter && matchesSearch;

        card.classList.toggle('hidden', !shouldShow);

        if (shouldShow) {
          visibleCount += 1;
        }
      });

      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
      updateMeta(searchTerm === '' && activeFilter === 'Semua' ? totalProduk : visibleCount);
    };

    filterButtons.forEach((button) => {
      button.addEventListener('click', function () {
        activeFilter = this.dataset.filter;
        filterButtons.forEach((item) => item.classList.remove('active'));
        this.classList.add('active');
        applyFilter();
      });
    });

    landingSearchInput.addEventListener('input', applyFilter);
    applyFilter();
  }
});
</script>
</body>
</html>
