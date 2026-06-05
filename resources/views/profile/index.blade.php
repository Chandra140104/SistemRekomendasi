<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile | Foxapaint</title>

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
    .profile-initial-avatar {
      align-items: center;
      background: #ffffff;
      border: 4px solid #274f8a;
      border-radius: 50%;
      color: #ed5d17;
      display: inline-flex;
      font-size: 56px;
      font-weight: 800;
      height: 128px;
      justify-content: center;
      line-height: 1;
      text-transform: uppercase;
      width: 128px;
    }

    .profile-header-blue {
      background-color: #1f3f6f !important;
      color: #ffffff !important;
    }

    .profile-save-btn {
      background-color: #ed5d17;
      border-color: #ed5d17;
      color: #ffffff;
    }

    .profile-save-btn:hover,
    .profile-save-btn:focus {
      background-color: #d95312;
      border-color: #d95312;
      color: #ffffff;
    }

    .profile-logout-btn {
      background-color: #dc3545;
      border-color: #dc3545;
      color: #ffffff;
    }

    .profile-logout-btn:hover,
    .profile-logout-btn:focus {
      background-color: #c82333;
      border-color: #c82333;
      color: #ffffff;
    }

    .profile-logout-form {
      display: block;
      width: 100%;
    }

  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.sidebar')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0 pl-3">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body box-profile">
              <div class="text-center">
                <span class="profile-initial-avatar">
                  {{ strtoupper(substr(trim($user->name ?? 'U'), 0, 1)) }}
                </span>
              </div>

              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <p class="text-muted text-center">{{ $user->level->nama ?? '-' }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Kode Level</b> <span class="float-right">{{ $user->level->kode ?? '-' }}</span>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-3">
            <form action="{{ route('logout') }}" method="POST" class="profile-logout-form">
              @csrf
              <button type="submit" class="btn profile-logout-btn btn-block">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
              </button>
            </form>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header profile-header-blue">
              <h3 class="card-title text-white">
                <i class="fas fa-id-card mr-1"></i> Data Users
              </h3>
            </div>
            <div class="card-body">
              <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="name">Nama</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                  >
                </div>

                <div class="form-group mb-0">
                  <label>Email</label>
                  <input
                    type="email"
                    class="form-control"
                    value="{{ $user->email }}"
                    readonly
                  >
                </div>
                <div class="text-center mt-3">
                  <button type="submit" class="btn profile-save-btn">
                    <i class="fas fa-save mr-1"></i> Simpan Nama
                  </button>
                </div>
              </form>

            </div>
          </div>

          <div class="card">
            <div class="card-header profile-header-blue">
              <h3 class="card-title text-white">
                <i class="fas fa-user-shield mr-1"></i> Data Level
              </h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-bordered mb-0">
                <tr>
                  <th>Kode Level</th>
                  <td>{{ $user->level->kode ?? '-' }}</td>
                </tr>
                <tr>
                  <th>Nama Level</th>
                  <td>{{ $user->level->nama ?? '-' }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<footer class="main-footer">
  <strong>Foxapaint &copy; 2026</strong>
</footer>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
