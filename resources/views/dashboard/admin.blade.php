@extends('layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $totalProduk }}</h3>
            <p>Total Produk</p>
          </div>
          <div class="icon">
            <i class="fas fa-box"></i>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalKategori }}</h3>
            <p>Total Kategori</p>
          </div>
          <div class="icon">
            <i class="fas fa-tags"></i>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $totalSubKategori }}</h3>
            <p>Total Sub Kategori</p>
          </div>
          <div class="icon">
            <i class="fas fa-sitemap"></i>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ $totalLokasiPenggunaan }}</h3>
            <p>Total Lokasi Penggunaan</p>
          </div>
          <div class="icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $totalKebutuhan }}</h3>
            <p>Total Kebutuhan</p>
          </div>
          <div class="icon">
            <i class="fas fa-list-check"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
