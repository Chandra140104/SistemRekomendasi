<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <!-- PROFILE DROPDOWN -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img
          src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
          class="img-circle elevation-2"
          style="width:32px;height:32px;object-fit:cover;"
        >
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
          {{ Auth::user()->name ?? 'User' }}
        </span>

        <div class="dropdown-divider"></div>

        <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
          @csrf
          <button type="submit" class="btn btn-link btn-block text-left">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </button>
        </form>
      </div>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}"
         class="brand-image img-circle elevation-3" style="opacity:.8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
             class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          {{ Auth::user()->name ?? 'User' }}
        </a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <!-- DASHBOARD -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}"
             class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- PRODUK -->
        <li class="nav-item">
          <a href="{{ route('produk.index') }}"
             class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>Produk</p>
          </a>
        </li>
        <!-- rekomendasi -->
        <li class="nav-item">
          <a href="{{ route('rekomendasi.index') }}"
             class="nav-link {{ request()->routeIs('rekomendasi.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>rekomendasi</p>
          </a>
        </li>


      </ul>
    </nav>
  </div>
</aside>
