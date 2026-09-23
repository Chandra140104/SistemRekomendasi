<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Penjelasan Sub Kategori | Sistem Rekomendasi Cat</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    html { scroll-behavior: smooth; }
    body.layout-top-nav { background: #ffffff; min-height: 100vh; }
    .product-content-wrapper { background: #ffffff; min-height: calc(100vh - 114px); padding: 38px 22px 48px; }
    .product-page { margin: 0 auto; max-width: 1120px; }
    .social-topbar { background: #ed5d17; padding: 8px 0; }
    .social-topbar-inner { align-items: center; display: flex; gap: 14px; }
    .social-topbar-link { align-items: center; background: #ffffff; border-radius: 50%; color: #ed5d17; display: inline-flex; font-size: 15px; height: 30px; justify-content: center; transition: .2s ease-in-out; width: 30px; }
    .social-topbar-link:hover { background: #ffe5d8; color: #b74206; }
    .public-brand-logo { display: block; height: 34px; max-width: 220px; object-fit: contain; width: auto; }
    .main-header { padding-bottom: 0.8rem; padding-top: 0.8rem; }
    .main-header .navbar-brand { margin-right: 2.5rem; }
    .main-header .navbar-nav { column-gap: 26px; }
    .main-header .nav-link { color: #1f3f6f !important; font-weight: 600; padding-left: 0.9rem; padding-right: 0.9rem; }
    .main-header .dropdown-menu { border-radius: 8px; margin-top: 0; min-width: 240px; }
    .main-header .dropdown-item { color: #1f3f6f; font-weight: 600; padding: 0.65rem 1rem; }
    .main-header .dropdown-item:hover, .main-header .dropdown-item:focus { background-color: #1f3f6f; color: #ffffff; }
    @media (min-width: 992px) {
      .main-header .dropdown > .dropdown-menu { display: none; }
      .main-header .dropdown:hover > .dropdown-menu { display: block; }
      .main-header .dropdown:hover > .nav-link { color: #163255 !important; }
    }
    .product-hero { margin-bottom: 24px; text-align: center; }
    .product-hero h1 { color: #1f3f6f; font-size: 36px; font-weight: 900; letter-spacing: 0; margin-bottom: 8px; text-transform: uppercase; }
    .product-hero p { color: #ed5d17; font-size: 18px; font-weight: 800; letter-spacing: 0; margin: 0; text-transform: uppercase; }
    .product-grid { display: grid; gap: 18px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .product-card { background: #fff; border-bottom: 3px solid #1f3f6f; border-radius: 8px; border-top: 4px solid #ed5d17; box-shadow: 0 10px 28px rgba(31, 63, 111, .10); padding: 20px; }
    .product-card-header { align-items: flex-start; display: flex; margin-bottom: 10px; }
    .product-card h3 { color: #1f3f6f; font-size: 20px; font-weight: 800; margin: 0; }
    .product-card p { color: #374151; line-height: 1.55; margin-bottom: 10px; }
    .product-card strong { color: #1f3f6f; }
    .product-card ul { color: #374151; margin-bottom: 10px; padding-left: 20px; }
    .landing-footer { background: #1f3f6f; border-top: 0; color: #ffffff; }
    .landing-footer strong { color: #ffffff; font-weight: 600; }
    @media (max-width: 991.98px) { .product-grid { grid-template-columns: 1fr; } .product-hero h1 { font-size: 28px; } }
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <div class="social-topbar">
    <div class="container">
      <div class="social-topbar-inner">
        <a href="https://wa.me/6282134054713" class="social-topbar-link" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer"><i class="fas fa-phone-alt"></i></a>
        <a href="mailto:marketing@primantaraindo.com" class="social-topbar-link" aria-label="Email"><i class="fas fa-envelope"></i></a>
        <a href="https://share.google/2aq90s8Y9LbSo5w2j" class="social-topbar-link" aria-label="Alamat" target="_blank" rel="noopener noreferrer"><i class="fas fa-map-marker-alt"></i></a>
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

              <a href="{{ route('about') }}#alur-sistem" class="dropdown-item">Alur sistem</a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper product-content-wrapper">
    <div class="product-page">
      <div class="product-hero" id="penjelasan-sub-kategori">
        <h1>Product</h1>
        <p>Sub Kategori Produk Cat</p>
      </div>

      <div class="product-grid">
        <div class="product-card">
          <div class="product-card-header">
            <h3>Primer 1st</h3>
          </div>
          <p>Cat pelapis dasar tahap pertama yang diaplikasikan langsung pada permukaan material mentah (seperti besi atau beton).</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Mencegah karat (pada besi) atau menahan alkali (pada beton)</li>
            <li>Memastikan daya rekat yang kuat pada material asli</li>
            <li>Menutup pori-pori awal material</li>
          </ul>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Primer 2nd</h3>
          </div>
          <p>Cat pelapis dasar tahap kedua (sering disebut intermediate atau undercoat) yang diaplikasikan setelah lapisan Primer 1st.</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Membangun ketebalan lapisan cat (build-up)</li>
            <li>Mengikat lapisan primer pertama dengan lapisan akhir (finish)</li>
            <li>Meningkatkan ketahanan dan proteksi jangka panjang</li>
          </ul>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Finish 3rd</h3>
          </div>
          <p>Cat pelapis tahap akhir (Top Coat) yang memberikan hasil warna utama dan perlindungan terluar dari produk cat.</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Menampilkan warna dan tekstur akhir yang diinginkan</li>
            <li>Melindungi lapisan di bawahnya dari cuaca, sinar UV, dan gesekan</li>
            <li>Tahan terhadap bahan kimia ringan dan air</li>
          </ul>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Finish Gloss 3rd</h3>
          </div>
          <p>Cat pelapis akhir dengan efek pantulan cahaya yang tinggi (mengkilap/glossy).</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Memberikan tampilan akhir yang sangat cerah dan mengkilap</li>
            <li>Lebih mudah dibersihkan dari debu dan noda</li>
            <li>Memberikan kesan mewah dan bersih pada permukaan</li>
          </ul>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Finish Matte 3rd</h3>
          </div>
          <p>Cat pelapis akhir dengan efek pantulan cahaya yang rendah (doff/matte/tidak mengkilap).</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Memberikan tampilan akhir yang natural, redup, dan elegan</li>
            <li>Mampu menyembunyikan ketidakrataan atau cacat kecil pada permukaan dinding/material</li>
            <li>Sangat cocok untuk ruangan dengan pencahayaan terang untuk menghindari silau</li>
          </ul>
        </div>

        <div class="product-card">
          <div class="product-card-header">
            <h3>Mortar</h3>
          </div>
          <p>Bahan campuran padat (sering berbahan dasar epoxy atau semen khusus) yang digunakan sebelum proses pengecatan utama.</p>
          <strong>Fungsi Utama:</strong>
          <ul>
            <li>Menambal lubang, retakan, atau kerusakan parah pada lantai beton</li>
            <li>Meratakan permukaan yang sangat bergelombang</li>
            <li>Memiliki daya tahan beban yang sangat tinggi (heavy duty)</li>
          </ul>
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
