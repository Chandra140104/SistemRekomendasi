<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About | AdminLTE</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    body.layout-top-nav {
      background: linear-gradient(135deg, #eef3f6 0%, #dfe7ec 100%);
      min-height: 100vh;
    }

    .about-content-wrapper {
      background: transparent;
      min-height: calc(100vh - 114px);
      padding: 42px 22px;
    }

    .about-page {
      margin: 0 auto;
      max-width: 980px;
    }

    .about-hero {
      margin-bottom: 24px;
      text-align: center;
    }

    .about-hero h1 {
      color: #0b4f2f;
      font-size: 36px;
      font-weight: 900;
      letter-spacing: 2px;
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    .about-hero p {
      color: #f0a500;
      font-size: 18px;
      font-weight: 800;
      letter-spacing: 2px;
      margin: 0;
      text-transform: uppercase;
    }

    .about-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
      padding: 34px 38px;
    }

    .about-card h2 {
      color: #0b4f2f;
      font-size: 24px;
      font-weight: 800;
      margin-bottom: 18px;
      text-align: center;
      text-transform: uppercase;
    }

    .about-card p {
      color: #374151;
      font-size: 16px;
      line-height: 1.75;
      margin-bottom: 16px;
      text-align: justify;
    }

    .about-card p:last-child {
      margin-bottom: 0;
    }

    .public-brand-logo {
      display: block;
      height: 34px;
      max-width: 220px;
      object-fit: contain;
      width: auto;
    }

    .recommendation-flow {
      margin-top: 32px;
      padding: 0 12px;
    }

    .flow-title {
      color: #1f2937;
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 26px;
      text-align: center;
      text-transform: uppercase;
    }

    .flow-timeline {
      margin: 0 auto;
      max-width: 620px;
      position: relative;
    }

    .flow-timeline::before {
      background: #0b4f2f;
      bottom: 18px;
      content: "";
      left: 50%;
      position: absolute;
      top: 18px;
      transform: translateX(-50%);
      width: 3px;
    }

    .flow-item {
      align-items: flex-start;
      display: grid;
      gap: 18px;
      grid-template-columns: 1fr 52px 1fr;
      margin-bottom: 22px;
      position: relative;
    }

    .flow-number {
      align-items: center;
      background: #0b4f2f;
      border: 4px solid #eef3f6;
      border-radius: 50%;
      color: #fff;
      display: flex;
      font-weight: 800;
      height: 52px;
      justify-content: center;
      position: relative;
      width: 52px;
      z-index: 1;
    }

    .flow-content {
      background: #fff;
      border-left: 4px solid #f0a500;
      border-radius: 8px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
      padding: 14px 16px;
    }

    .flow-left .flow-content {
      border-left: 0;
      border-right: 4px solid #f0a500;
      grid-column: 1;
      grid-row: 1;
      text-align: right;
    }

    .flow-left .flow-number {
      grid-column: 2;
      grid-row: 1;
    }

    .flow-left .flow-spacer {
      grid-column: 3;
      grid-row: 1;
    }

    .flow-content h3 {
      color: #0b4f2f;
      font-size: 17px;
      font-weight: 800;
      margin: 0 0 5px;
    }

    .flow-content p {
      color: #4b5563;
      margin: 0;
      text-align: left;
    }

    .flow-left .flow-content p {
      text-align: right;
    }

    .flow-spacer {
      min-height: 1px;
    }

    @media (max-width: 767.98px) {
      .about-card {
        padding: 26px 22px;
      }

      .about-hero h1 {
        font-size: 28px;
      }

      .flow-timeline::before {
        left: 26px;
      }

      .flow-item {
        grid-template-columns: 52px 1fr;
      }

      .flow-spacer {
        display: none;
      }

      .flow-left .flow-content,
      .flow-left .flow-number {
        grid-column: auto;
        grid-row: auto;
      }

      .flow-left .flow-content {
        border-left: 4px solid #f0a500;
        border-right: 0;
        text-align: left;
      }

      .flow-left .flow-content p {
        text-align: left;
      }
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
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
          <li class="nav-item">
            <a href="{{ route('product') }}" class="nav-link">Product</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link active">About</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper about-content-wrapper">
    <div class="about-page">
      <div class="about-hero">
        <h1>Sistem Rekomendasi</h1>
        <p>PT Primantara Nusa Samasta</p>
      </div>

      <div class="about-card">
        <h2>About</h2>

        <p>Website ini merupakan platform berbasis web yang dirancang untuk membantu pengguna dalam menemukan produk cat yang sesuai dengan kebutuhan dan preferensi mereka. Di tengah banyaknya pilihan produk cat dengan berbagai kategori, fungsi, dan keunggulan, pengguna sering kali mengalami kesulitan dalam menentukan produk yang paling tepat. Oleh karena itu, website ini hadir sebagai solusi yang mampu memberikan rekomendasi produk secara lebih terarah dan efisien.</p>

        <p>Sistem yang dikembangkan dalam website ini menggunakan metode content-based filtering, yaitu sebuah pendekatan yang memberikan rekomendasi berdasarkan kesamaan karakteristik atau atribut dari suatu produk. Atribut yang digunakan meliputi kategori produk, sub kategori, lokasi penggunaan, serta kebutuhan dari masing-masing produk cat. Dengan memanfaatkan informasi tersebut, sistem akan menganalisis kebutuhan pengguna dan mencocokkannya dengan produk yang tersedia, sehingga menghasilkan rekomendasi yang relevan dan sesuai.</p>

        <p>Selain itu, proses perhitungan kemiripan antar produk dilakukan menggunakan metode Dice Similarity Coefficient, yang memungkinkan sistem untuk menentukan tingkat kesesuaian antara input pengguna dengan data produk secara lebih akurat. Hasil dari perhitungan tersebut kemudian diurutkan sehingga pengguna dapat melihat produk dengan tingkat kecocokan tertinggi sebagai rekomendasi utama.</p>

        <p>Website ini tidak hanya bertujuan untuk mempermudah proses pencarian produk, tetapi juga untuk meningkatkan pengalaman pengguna dalam memilih produk cat tanpa harus menelusuri seluruh daftar produk secara manual. Dengan tampilan yang sederhana dan sistem yang responsif, pengguna dapat dengan mudah mendapatkan informasi dan rekomendasi produk dalam waktu yang singkat.</p>

        <p>Melalui pengembangan website ini, diharapkan dapat memberikan manfaat baik bagi pengguna maupun pihak perusahaan, khususnya dalam mendukung proses pemasaran dan pengambilan keputusan yang lebih efektif. Website ini juga menjadi bentuk implementasi teknologi sistem rekomendasi dalam bidang industri cat yang dapat dikembangkan lebih lanjut di masa mendatang.</p>
      </div>

      <section class="recommendation-flow">
        <h2 class="flow-title">Alur Sistem Rekomendasi</h2>

        <div class="flow-timeline">
          <div class="flow-item flow-left">
            <div class="flow-spacer"></div>
            <div class="flow-number">1</div>
            <div class="flow-content">
              <h3>User Login</h3>
              <p>User masuk ke sistem menggunakan akun yang sudah terdaftar.</p>
            </div>
          </div>

          <div class="flow-item">
            <div class="flow-spacer"></div>
            <div class="flow-number">2</div>
            <div class="flow-content">
              <h3>Memilih Menu Rekomendasi Produk</h3>
              <p>User membuka fitur rekomendasi produk pada sistem.</p>
            </div>
          </div>

          <div class="flow-item flow-left">
            <div class="flow-spacer"></div>
            <div class="flow-number">3</div>
            <div class="flow-content">
              <h3>Mengisi Form Kebutuhan</h3>
              <p>User mengisi kategori, sub kategori, lokasi penggunaan, dan kebutuhan produk.</p>
            </div>
          </div>

          <div class="flow-item">
            <div class="flow-spacer"></div>
            <div class="flow-number">4</div>
            <div class="flow-content">
              <h3>Perhitungan Content-Based Filtering</h3>
              <p>Sistem membandingkan input user dengan atribut produk menggunakan metode Content-Based Filtering.</p>
            </div>
          </div>

          <div class="flow-item flow-left">
            <div class="flow-spacer"></div>
            <div class="flow-number">5</div>
            <div class="flow-content">
              <h3>Menampilkan Ranking Produk</h3>
              <p>Sistem menampilkan hasil ranking produk dari nilai similarity tertinggi ke terendah.</p>
            </div>
          </div>

          <div class="flow-item">
            <div class="flow-spacer"></div>
            <div class="flow-number">6</div>
            <div class="flow-content">
              <h3>Membuka Detail Produk</h3>
              <p>User bisa membuka detail produk untuk melihat informasi produk yang direkomendasikan.</p>
            </div>
          </div>

          <div class="flow-item flow-left">
            <div class="flow-spacer"></div>
            <div class="flow-number">7</div>
            <div class="flow-content">
              <h3>Melihat Riwayat Rekomendasi</h3>
              <p>User bisa melihat riwayat rekomendasi sebelumnya tanpa harus mengisi ulang dari awal.</p>
            </div>
          </div>
        </div>
      </section>
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
