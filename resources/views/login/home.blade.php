<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | AdminLTE</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    html {
      scroll-behavior: smooth;
    }

    body.layout-top-nav {
      background: linear-gradient(135deg, #eef3f6 0%, #dfe7ec 100%);
      min-height: 100vh;
    }

    .home-content-wrapper {
      background: transparent;
      min-height: calc(100vh - 57px);
      margin-left: 0 !important;
    }

    .social-topbar {
      background: #ed5d17;
      padding: 8px 0;
    }

    .social-topbar-inner {
      align-items: center;
      display: flex;
      gap: 14px;
    }

    .social-topbar-link {
      align-items: center;
      background: #ffffff;
      border-radius: 50%;
      color: #ed5d17;
      display: inline-flex;
      font-size: 15px;
      height: 30px;
      justify-content: center;
      transition: .2s ease-in-out;
      width: 30px;
    }

    .social-topbar-link:hover {
      background: #ffe5d8;
      color: #b74206;
    }

    .public-brand-logo {
      display: block;
      height: 34px;
      max-width: 220px;
      object-fit: contain;
      width: auto;
    }

    .landing-navbar .navbar-nav {
      column-gap: 26px;
    }

    .landing-navbar .navbar-brand {
      margin-right: 2.5rem;
    }

    .landing-navbar {
      padding-bottom: 0.8rem;
      padding-top: 0.8rem;
    }

    .landing-navbar .nav-link {
      color: #1f3f6f !important;
      font-weight: 600;
      padding-left: 0.9rem;
      padding-right: 0.9rem;
    }

    .landing-navbar .nav-link:hover,
    .landing-navbar .nav-link:focus {
      color: #163255 !important;
    }

    .home-hero {
      align-items: center;
      background-image:
        linear-gradient(rgba(10, 25, 20, 0.58), rgba(10, 25, 20, 0.58)),
        url('{{ asset('images/backgorund/background.png') }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 0;
      box-shadow: none;
      display: grid;
      gap: 36px;
      grid-template-columns: 1fr;
      margin: 0;
      max-width: none;
      position: relative;
      width: 100%;
      min-height: calc(100vh - 114px);
      padding: 42px 32px 124px;
      text-align: center;
    }

    .brand-title {
      color: #ffffff;
      font-size: clamp(42px, 5vw, 72px);
      font-weight: 900;
      letter-spacing: 5px;
      line-height: 1.08;
      margin: 0;
      text-transform: uppercase;
    }

    .brand-subtitle {
      color: #ffffff;
      font-size: clamp(20px, 2.4vw, 34px);
      font-weight: 800;
      letter-spacing: 3px;
      margin-top: 18px;
      text-transform: uppercase;
    }

    .brand-description {
      color: #f8fafc;
      font-size: 18px;
      line-height: 1.7;
      margin: 26px auto 0;
      max-width: 760px;
    }

    .hero-actions {
      display: flex;
      gap: 14px;
      justify-content: center;
      margin-top: 28px;
    }

    .hero-actions .btn {
      min-width: 150px;
    }

    .hero-actions .btn-primary {
      background-color: #1f3f6f;
      border-color: #1f3f6f;
    }

    .hero-actions .btn-primary:hover,
    .hero-actions .btn-primary:focus {
      background-color: #163255;
      border-color: #163255;
    }

    .hero-actions .btn-outline-secondary {
      background: rgba(255, 255, 255, 0.12);
      border-color: rgba(255, 255, 255, 0.85);
      color: #ffffff;
    }

    .hero-actions .btn-outline-secondary:hover {
      background: rgba(255, 255, 255, 0.22);
      border-color: #ffffff;
      color: #ffffff;
    }

    .hero-highlight {
      align-items: center;
      backdrop-filter: blur(10px);
      background: rgba(8, 16, 14, 0.46);
      border-top: 1px solid rgba(255, 255, 255, 0.12);
      bottom: 0;
      display: flex;
      justify-content: space-between;
      left: 0;
      padding: 24px 42px;
      position: absolute;
      right: 0;
    }

    .hero-highlight-copy {
      color: #ffffff;
      font-family: "Source Sans Pro", sans-serif;
      font-size: clamp(14px, 1.3vw, 17px);
      font-weight: 600;
      line-height: 1.4;
      margin-right: 24px;
      text-align: left;
    }

    .hero-highlight-copy span {
      display: inline;
      opacity: 0.92;
    }

    .hero-highlight-action {
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.75);
      border-radius: 10px;
      color: #ffffff;
      font-size: 17px;
      font-weight: 700;
      min-width: 180px;
      padding: 14px 24px;
      transition: .2s ease-in-out;
      white-space: nowrap;
    }

    .hero-highlight-action:hover {
      background: rgba(255, 255, 255, 0.12);
      color: #ffffff;
    }

    .catalog-preview {
      margin: 24px auto 44px;
      max-width: 1120px;
      padding: 0 24px;
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

    .catalog-product-code {
      color: #475569;
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 10px;
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

    .landing-footer {
      background: #1f3f6f;
      color: #ffffff;
    }

    .landing-footer strong {
      color: #ffffff;
    }

    @media (max-width: 991.98px) {
      .home-hero {
        padding: 34px 22px 24px;
      }

      .hero-actions {
        flex-direction: column;
        align-items: center;
      }

      .hero-actions .btn {
        width: 100%;
        max-width: 280px;
      }

      .catalog-preview-bar {
        padding-bottom: 12px;
      }

      .hero-highlight {
        flex-direction: column;
        gap: 18px;
        padding: 20px 22px;
      }

      .hero-highlight-copy {
        margin-right: 0;
        text-align: center;
      }

      .catalog-product-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 767.98px) {
      .catalog-product-card {
        flex-direction: column;
      }

      .catalog-product-media {
        flex-basis: auto;
        min-height: 180px;
      }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
      .catalog-product-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <div class="social-topbar">
    <div class="container">
      <div class="social-topbar-inner">
        <a href="https://wa.me/6282134054713" class="social-topbar-link" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-phone-alt"></i>
        </a>
        <a href="mailto:marketing@primantaraindo.com" class="social-topbar-link" aria-label="Email">
          <i class="fas fa-envelope"></i>
        </a>
        <a href="https://share.google/2aq90s8Y9LbSo5w2j" class="social-topbar-link" aria-label="Alamat" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-map-marker-alt"></i>
        </a>
      </div>
    </div>
  </div>

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white landing-navbar">
    <div class="container">
      <a href="{{ route('landing') }}" class="navbar-brand">
        <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo" class="public-brand-logo">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('product') }}" class="nav-link">Product</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="fas fa-sign-in-alt mr-1"></i>Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper home-content-wrapper">
    <section class="home-hero">
      <div>
        <h1 class="brand-title">SISTEM REKOMENDASI</h1>
        <div class="brand-subtitle">PT PRIMANTARA NUSA SAMASTA</div>
        <p class="brand-description">
          Sitem rekomendasi produk cat metode Content-Based Filtering untuk membantu menemukan produk yang paling sesuai dengan kebutuhan.
        </p>
        <div class="hero-actions">
          <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
          <a href="{{ route('product') }}" class="btn btn-outline-secondary">Penjelasan Produk</a>
        </div>
      </div>

      <div class="hero-highlight">
        <div class="hero-highlight-copy">
          <span>Temukan produk cat yang paling sesuai dengan kebutuhanmu</span>
        </div>
        <a href="#katalog-cat" class="btn hero-highlight-action">Lihat Produk</a>
      </div>
    </section>

    <section class="catalog-preview" id="katalog-cat">
      <div class="catalog-preview-bar">
        <button type="button" class="catalog-preview-chip active" data-filter="Semua">Semua</button>
        @foreach ($kategoriLanding as $kategori)
          <button type="button" class="catalog-preview-chip" data-filter="{{ $kategori }}">{{ $kategori }}</button>
        @endforeach
      </div>

      <div class="catalog-search-box">
        <i class="fas fa-search"></i>
        <input type="text"
               class="catalog-search-input"
               id="catalogSearchInput"
               placeholder="Cari produk cat">
      </div>

      <div class="catalog-preview-meta">{{ $totalProdukLanding }} produk</div>

      <div class="catalog-product-grid" id="catalogProductGrid">
        @foreach ($produkLanding as $produk)
          @php
            $detailItems = array_filter([
                $produk->sub_kategori,
                $produk->lokasi_penggunaan,
                $produk->kelebihan,
            ]);
          @endphp
          <article class="catalog-product-card"
                   data-kategori="{{ $produk->kategori->nama ?? '' }}"
                   data-nama="{{ strtolower($produk->nama) }}"
                   data-search="{{ strtolower(trim(($produk->nama ?? '') . ' ' . ($produk->kategori->nama ?? '') . ' ' . ($produk->sub_kategori ?? '') . ' ' . ($produk->lokasi_penggunaan ?? '') . ' ' . ($produk->kelebihan ?? ''))) }}">
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

  <footer class="main-footer text-center landing-footer">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = Array.from(document.querySelectorAll('.catalog-preview-chip'));
    const productCards = Array.from(document.querySelectorAll('.catalog-product-card'));
    const searchInput = document.getElementById('catalogSearchInput');
    const emptyState = document.getElementById('catalogProductEmpty');
    const meta = document.querySelector('.catalog-preview-meta');
    const totalProduk = {{ $totalProdukLanding }};
    let activeFilter = 'Semua';

    const updateMeta = (visibleCount) => {
      meta.textContent = visibleCount + ' produk';
    };

    const applyFilter = () => {
      const searchTerm = (searchInput.value || '').trim().toLowerCase();
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

    searchInput.addEventListener('input', applyFilter);

    applyFilter();
  });
</script>
</body>
</html>
