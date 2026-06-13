<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="https://wa.me/6282134054713" class="nav-link" target="_blank" rel="noopener noreferrer" aria-label="Telepon">
        <i class="fas fa-phone-alt"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="mailto:marketing@primantaraindo.com" class="nav-link" aria-label="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="https://share.google/2aq90s8Y9LbSo5w2j" class="nav-link" target="_blank" rel="noopener noreferrer" aria-label="Lokasi">
        <i class="fas fa-map-marker-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link topbar-profile-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
        <span class="topbar-avatar">
          {{ strtoupper(substr(trim(Auth::user()->name ?? 'U'), 0, 1)) }}
        </span>
        <i class="fas fa-chevron-down topbar-profile-caret"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('profile.index') }}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Profile
        </a>

        <div class="dropdown-divider"></div>

        <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
          @csrf
          <button type="submit" class="btn btn-link btn-block text-left topbar-logout-btn">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </button>
        </form>
      </div>
    </li>

  </ul>
</nav>
<style>
  .main-sidebar.sidebar-dark-primary {
    background-color: #163255;
  }

  .main-sidebar.sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {
    background-color: #ed5d17;
    color: #ffffff;
  }

  .main-sidebar.sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active:hover {
    background-color: #d95312;
    color: #ffffff;
  }

  .main-sidebar .brand-link {
    display: none;
  }

  .main-sidebar .sidebar {
    padding-top: 0.5rem;
  }

  .main-sidebar .user-panel {
    margin-top: 0.5rem !important;
    justify-content: center;
  }

  .main-sidebar .user-panel .image {
    margin-left: -8px;
  }

  .sidebar-logo-badge {
    align-items: center;
    background: #ffffff;
    border-radius: 14px;
    display: inline-flex;
    height: 74px;
    justify-content: center;
    padding: 12px 14px;
    width: 168px;
  }

  .sidebar-logo-badge img {
    height: auto;
    max-width: 136px;
    width: 100%;
  }

  .topbar-profile-toggle {
    align-items: center;
    display: flex;
    gap: 8px;
    padding-bottom: 0.5rem;
    padding-top: 0.5rem;
  }

  .topbar-avatar {
    align-items: center;
    background: #ffffff;
    border: 2px solid #1f3f6f;
    border-radius: 50%;
    color: #ed5d17;
    display: inline-flex;
    font-size: 15px;
    font-weight: 800;
    height: 32px;
    justify-content: center;
    line-height: 1;
    text-transform: uppercase;
    width: 32px;
  }

  .topbar-profile-caret {
    color: #6b7280;
    font-size: 12px;
  }

  .topbar-logout-btn {
    color: #dc3545;
  }

  .topbar-logout-btn:hover,
  .topbar-logout-btn:focus {
    color: #c82333;
    text-decoration: none;
  }

</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <span class="sidebar-logo-badge elevation-2">
          <img src="{{ asset('images/Logo/Primary-Logo-12-2048x615.png') }}" alt="Primantara Indo">
        </span>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

  @if(Auth::check() && Auth::user()->level->kode == 'ADM')
  <li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>Dashboard</p>
    </a>
  </li>
  @endif

  @if(Auth::check() && Auth::user()->level->kode == 'USR')
  <li class="nav-item">
    <a href="{{ route('katalog.index') }}"
       class="nav-link {{ request()->routeIs('katalog.*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-book-open"></i>
      <p>Katalog</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('rekomendasi.index') }}"
       class="nav-link {{ request()->routeIs('rekomendasi.index') ? 'active' : '' }}">
      <i class="nav-icon fas fa-search"></i>
      <p>Rekomendasi Produk</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('rekomendasi.history') }}"
       class="nav-link {{ request()->routeIs('rekomendasi.history*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-history"></i>
      <p>Riwayat Input</p>
    </a>
  </li>
  @endif

  <!-- ================= ADMIN ONLY ================= -->
  @if(Auth::check() && Auth::user()->level->kode == 'ADM')

  <!-- PRODUK / MASTER DATA -->
  <li class="nav-item has-treeview {{ request()->routeIs('produk.*', 'kategori.*', 'sub-kategori.*', 'lokasi-penggunaan.*', 'kebutuhan.*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('produk.*', 'kategori.*', 'sub-kategori.*', 'lokasi-penggunaan.*', 'kebutuhan.*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Produk
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('produk.index') }}"
           class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Produk</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('kategori.index') }}"
           class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Kategori</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('sub-kategori.index') }}"
           class="nav-link {{ request()->routeIs('sub-kategori.*') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Sub Kategori</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('lokasi-penggunaan.index') }}"
           class="nav-link {{ request()->routeIs('lokasi-penggunaan.*') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Lokasi Penggunaan</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('kebutuhan.index') }}"
           class="nav-link {{ request()->routeIs('kebutuhan.*') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Kebutuhan</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- LEVEL -->
  <li class="nav-item">
    <a href="{{ route('level.index') }}"
       class="nav-link {{ request()->routeIs('level.*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-user-shield"></i>
      <p>Level</p>
    </a>
  </li>

  <!-- PENGGUNA -->
  <li class="nav-item">
    <a href="{{ route('user.index') }}"
       class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-users"></i>
      <p>Pengguna</p>
    </a>
  </li>

  @endif

  <li class="nav-item mt-3">
    <a href="{{ route('profile.index') }}"
       class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-user-circle"></i>
      <p>Profile</p>
    </a>
  </li>

</ul>
    </nav>
  </div>
</aside>
