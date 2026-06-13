<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Penjelasan Kategori Produk | Sistem Rekomendasi Cat</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    html {
      scroll-behavior: smooth;
    }

    body.layout-top-nav {
      background: #ffffff;
      min-height: 100vh;
    }

    .product-content-wrapper {
      background: #ffffff;
      min-height: calc(100vh - 114px);
      padding: 38px 22px 48px;
    }

    .product-page {
      margin: 0 auto;
      max-width: 1120px;
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

    .main-header {
      padding-bottom: 0.8rem;
      padding-top: 0.8rem;
    }

    .main-header .navbar-brand {
      margin-right: 2.5rem;
    }

    .main-header .navbar-nav {
      column-gap: 26px;
    }

    .main-header .nav-link {
      color: #1f3f6f !important;
      font-weight: 600;
      padding-left: 0.9rem;
      padding-right: 0.9rem;
    }

    .main-header .dropdown-menu {
      border-radius: 8px;
      margin-top: 0;
      min-width: 240px;
    }

    .main-header .dropdown-item {
      color: #1f3f6f;
      font-weight: 600;
      padding: 0.65rem 1rem;
    }

    .main-header .dropdown-item:hover,
    .main-header .dropdown-item:focus {
      background-color: #1f3f6f;
      color: #ffffff;
    }

    @media (min-width: 992px) {
      .main-header .dropdown > .dropdown-menu {
        display: none;
      }

      .main-header .dropdown:hover > .dropdown-menu {
        display: block;
      }

      .main-header .dropdown:hover > .nav-link {
        color: #163255 !important;
      }
    }

    .product-hero {
      margin-bottom: 24px;
      text-align: center;
    }

    .product-hero h1 {
      color: #1f3f6f;
      font-size: 36px;
      font-weight: 900;
      letter-spacing: 0;
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    .product-hero p {
      color: #ed5d17;
      font-size: 18px;
      font-weight: 800;
      letter-spacing: 0;
      margin: 0;
      text-transform: uppercase;
    }

    .product-grid {
      display: grid;
      gap: 18px;
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .product-card {
      background: #fff;
      border-bottom: 3px solid #1f3f6f;
      border-radius: 8px;
      border-top: 4px solid #ed5d17;
      box-shadow: 0 10px 28px rgba(31, 63, 111, .10);
      padding: 20px;
    }

    .product-card-header {
      align-items: flex-start;
      display: flex;
      margin-bottom: 10px;
    }

    .product-card h3 {
      color: #1f3f6f;
      font-size: 20px;
      font-weight: 800;
      margin: 0;
    }

    .product-card p {
      color: #374151;
      line-height: 1.55;
      margin-bottom: 10px;
    }

    .product-card strong {
      color: #1f3f6f;
    }

    .product-card ul {
      color: #374151;
      margin-bottom: 10px;
      padding-left: 20px;
    }

    .landing-footer {
      background: #1f3f6f;
      border-top: 0;
      color: #ffffff;
    }

    .landing-footer strong {
      color: #ffffff;
      font-weight: 600;
    }

    @media (max-width: 991.98px) {
      .product-grid {
        grid-template-columns: 1fr;
      }

      .product-hero h1 {
        font-size: 28px;
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

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ route('landing') }}" class="navbar-brand">
        <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo" class="public-brand-logo">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="productDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle active">Product</a>
            <div aria-labelledby="productDropdown" class="dropdown-menu border-0 shadow">
              <a href="{{ route('penjelasan-kategori-produk') }}" class="dropdown-item">Penjelasan kategori produk</a>
              <a href="{{ route('penjelasan-sub-kategori') }}" class="dropdown-item">Penjelasan sub kategori</a>
              <a href="{{ route('landing') }}#katalog-cat" class="dropdown-item">Katalog produk</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="aboutDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">About</a>
            <div aria-labelledby="aboutDropdown" class="dropdown-menu border-0 shadow">
              <a href="{{ route('about') }}#penjelasan-sistem-rekomendasi" class="dropdown-item">Penjelasan sistem rekomendasi</a>
              <a href="{{ route('about') }}#content-based-filtering" class="dropdown-item">Metode content-based filtering</a>
              <a href="{{ route('about') }}#alur-sistem" class="dropdown-item">Alur sistem</a>
            </div>
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

  <div class="content-wrapper product-content-wrapper">
    <div class="product-page">
      <div class="product-hero" id="penjelasan-kategori-produk">
        <h1>Product</h1>
        <p>Kategori Produk Cat</p>
      </div>

      <div class="product-grid">
        <div class="product-card" id="penjelasan-sub-kategori">
          <div class="product-card-header">
            <h3>Acrylic</h3>
          </div>
          <p>Cat berbasis air yang cepat kering dan mudah digunakan.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Cepat kering</li>
            <li>Tidak berbau menyengat</li>
            <li>Cocok untuk indoor & outdoor</li>
          </ul>
          <p>Biasanya digunakan untuk: tembok rumah, dekorasi, dan permukaan umum.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Alkyd</h3>
          </div>
          <p>Cat berbasis minyak (oil-based) dengan hasil lebih kuat dan mengkilap.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Tahan lama</li>
            <li>Hasil halus & glossy</li>
            <li>Lebih tahan gores</li>
          </ul>
          <p>Biasanya digunakan untuk: kayu, besi, pintu, furniture.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Epoxy</h3>
          </div>
          <p>Cat dengan ketahanan tinggi terhadap bahan kimia dan gesekan.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Sangat kuat & tahan lama</li>
            <li>Tahan bahan kimia</li>
            <li>Anti gores & tahan beban berat</li>
          </ul>
          <p>Biasanya digunakan untuk: lantai pabrik, gudang, rumah sakit.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Polyurethane</h3>
          </div>
          <p>Cat pelapis dengan hasil akhir premium dan tahan cuaca.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Tahan UV & cuaca</li>
            <li>Hasil mengkilap elegan</li>
            <li>Tahan gores</li>
          </ul>
          <p>Biasanya digunakan untuk: mobil, kayu, outdoor furniture.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Floor (Cat Lantai)</h3>
          </div>
          <p>Cat khusus untuk lantai dengan daya tahan tinggi.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Anti slip (tergantung jenis)</li>
            <li>Tahan gesekan</li>
            <li>Mudah dibersihkan</li>
          </ul>
          <p>Biasanya digunakan untuk: lantai rumah, gudang, parkiran.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Decorative</h3>
          </div>
          <p>Cat yang digunakan untuk memperindah tampilan.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Banyak variasi tekstur & warna</li>
            <li>Memberikan nilai estetika</li>
          </ul>
          <p>Biasanya digunakan untuk: interior rumah, cafe, hotel.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Waterproofing</h3>
          </div>
          <p>Cat pelapis anti bocor yang tahan air.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Mencegah rembesan air</li>
            <li>Tahan cuaca ekstrem</li>
          </ul>
          <p>Biasanya digunakan untuk: atap, dinding luar, kamar mandi.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Anti Fouling</h3>
          </div>
          <p>Cat khusus untuk mencegah lumut dan organisme laut menempel.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Mencegah karang/lumut</li>
            <li>Melindungi permukaan bawah air</li>
          </ul>
          <p>Biasanya digunakan untuk: kapal, struktur laut.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Zinc Rich</h3>
          </div>
          <p>Cat primer dengan kandungan zinc untuk anti karat.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Melindungi dari korosi</li>
            <li>Cocok untuk lingkungan ekstrem</li>
          </ul>
          <p>Biasanya digunakan untuk: baja, jembatan, konstruksi.</p>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Heat Resistance</h3>
          </div>
          <p>Cat tahan suhu tinggi.</p>
          <strong>Kebutuhan:</strong>
          <ul>
            <li>Tahan panas ekstrem</li>
            <li>Tidak mudah mengelupas</li>
          </ul>
          <p>Biasanya digunakan untuk: knalpot, mesin, pipa panas.</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer text-center landing-footer">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
  document.querySelectorAll('.main-header .dropdown-toggle').forEach((toggle) => {
    toggle.addEventListener('click', (event) => {
      if (window.innerWidth >= 992) {
        event.preventDefault();
        event.stopPropagation();
      }
    });
  });
</script>
</body>
</html>
