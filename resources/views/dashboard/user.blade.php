@extends('layouts.app')

@section('content')

<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Halaman User</h3>

      <div class="card-tools">
        <button class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <h5>Selamat datang, {{ Auth::user()->name }}</h5>
      <p>Silakan gunakan sistem rekomendasi untuk menemukan produk terbaik.</p>
    </div>

    <div class="card-footer">
      Sistem Rekomendasi Cat
    </div>
  </div>

</section>

@endsection