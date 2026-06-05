<section class="content-header">
  <div class="container-fluid">
    @php
      $pageTitle = 'Blank Page';

      if (request()->routeIs('dashboard') && auth()->check() && auth()->user()->level->kode === 'ADM') {
          $pageTitle = 'Dashboard Admin';
      }
    @endphp
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $pageTitle }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>
