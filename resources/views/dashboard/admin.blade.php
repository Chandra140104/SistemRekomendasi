@extends('layouts.app')

@section('content')
@php
  $chartPalette = ['#163255', '#274f8a', '#ed5d17', '#f59e0b', '#14b8a6'];

  $buildBarChartData = function ($items) use ($chartPalette) {
      $items = collect($items)->take(5)->values();

      return [
          'labels' => $items->pluck('nama')->values(),
          'totals' => $items->pluck('total')->values(),
          'colors' => collect($chartPalette)->take(max($items->count(), 1))->values(),
      ];
  };

  $topProdukChart = $buildBarChartData($topProdukRekomendasi);
  $topKategoriChart = $buildBarChartData($topKategoriRekomendasi);
  $topSubKategoriChart = $buildBarChartData($topSubKategoriRekomendasi);
  $topLokasiChart = $buildBarChartData($topLokasiPenggunaanRekomendasi);
  $topKebutuhanChart = $buildBarChartData($topKebutuhanRekomendasi);
@endphp

<style>
  .dashboard-chart-card .card-body {
    min-height: 340px;
  }

  .dashboard-chart-box {
    position: relative;
    height: 260px;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg col-md-6 col-12">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $totalProduk }}</h3>
            <p>Produk</p>
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
            <p>Kategori</p>
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
            <p>Sub Kategori</p>
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
            <p>Lokasi Penggunaan</p>
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
            <p>Kebutuhan</p>
          </div>
          <div class="icon">
            <i class="fas fa-list-check"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline dashboard-chart-card">
          <div class="card-header">
            <h3 class="card-title">Top 5 Produk yang Paling Sering Direkomendasikan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="dashboard-chart-box">
                <canvas id="topProdukChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-success card-outline dashboard-chart-card">
          <div class="card-header">
            <h3 class="card-title">Top 5 Kategori Paling Sering Direkomendasikan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="dashboard-chart-box">
                <canvas id="topKategoriChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-warning card-outline dashboard-chart-card">
          <div class="card-header">
            <h3 class="card-title">Top 5 Sub Kategori Paling Sering Direkomendasikan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="dashboard-chart-box">
                <canvas id="topSubKategoriChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-info card-outline dashboard-chart-card">
          <div class="card-header">
            <h3 class="card-title">Top 5 Lokasi Penggunaan Paling Sering Digunakan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="dashboard-chart-box">
                <canvas id="topLokasiChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-danger card-outline dashboard-chart-card">
          <div class="card-header">
            <h3 class="card-title">Top 5 Kebutuhan Paling Sering Digunakan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="dashboard-chart-box">
                <canvas id="topKebutuhanChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<script>
  const buildHorizontalBarChart = (canvasId, labels, totals, colors) => {
    const canvas = document.getElementById(canvasId);

    if (!canvas || !labels.length || !totals.length) {
      return;
    }

    new Chart(canvas, {
      type: 'horizontalBar',
      data: {
        labels: labels,
        datasets: [{
          data: totals,
          backgroundColor: colors,
          borderColor: colors,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true,
              precision: 0
            },
            gridLines: {
              color: 'rgba(0, 0, 0, 0.08)'
            }
          }],
          yAxes: [{
            gridLines: {
              display: false
            },
            ticks: {
              fontStyle: '600'
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem) {
              return tooltipItem.xLabel + ' kali';
            }
          }
        }
      }
    });
  };

  buildHorizontalBarChart(
    'topProdukChart',
    @json($topProdukChart['labels']),
    @json($topProdukChart['totals']),
    @json($topProdukChart['colors'])
  );

  buildHorizontalBarChart(
    'topKategoriChart',
    @json($topKategoriChart['labels']),
    @json($topKategoriChart['totals']),
    @json($topKategoriChart['colors'])
  );

  buildHorizontalBarChart(
    'topSubKategoriChart',
    @json($topSubKategoriChart['labels']),
    @json($topSubKategoriChart['totals']),
    @json($topSubKategoriChart['colors'])
  );

  buildHorizontalBarChart(
    'topLokasiChart',
    @json($topLokasiChart['labels']),
    @json($topLokasiChart['totals']),
    @json($topLokasiChart['colors'])
  );

  buildHorizontalBarChart(
    'topKebutuhanChart',
    @json($topKebutuhanChart['labels']),
    @json($topKebutuhanChart['totals']),
    @json($topKebutuhanChart['colors'])
  );
</script>
@endpush
