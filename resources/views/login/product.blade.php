<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product | AdminLTE</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    body.layout-top-nav {
      background: linear-gradient(135deg, #eef3f6 0%, #dfe7ec 100%);
      min-height: 100vh;
    }

    .product-content-wrapper {
      background: transparent;
      min-height: calc(100vh - 114px);
      padding: 42px 22px;
    }

    .product-page {
      margin: 0 auto;
      max-width: 1120px;
    }

    .product-hero {
      margin-bottom: 24px;
      text-align: center;
    }

    .product-hero h1 {
      color: #0b4f2f;
      font-size: 36px;
      font-weight: 900;
      letter-spacing: 2px;
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    .product-hero p {
      color: #f0a500;
      font-size: 18px;
      font-weight: 800;
      letter-spacing: 2px;
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
      border-left: 4px solid #0b4f2f;
      border-radius: 8px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
      padding: 20px;
    }

    .product-card-header {
      align-items: flex-start;
      display: flex;
      margin-bottom: 10px;
    }

    .product-card h3 {
      color: #0b4f2f;
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
      color: #1f2937;
    }

    .product-card ul {
      color: #374151;
      margin-bottom: 10px;
      padding-left: 20px;
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
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ route('landing') }}" class="navbar-brand">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('product') }}" class="nav-link active">Product</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper product-content-wrapper">
    <div class="product-page">
      <div class="product-hero">
        <h1>Product</h1>
        <p>Kategori Produk Cat</p>
      </div>

      <div class="product-grid">
        <div class="product-card">
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

  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2026 PT Primantara Nusa Samasta.</strong>
  </footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
