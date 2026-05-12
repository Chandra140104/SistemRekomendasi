<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\UserController;
use App\Models\Kategori;
use App\Models\Produk;

/*
|--------------------------------------------------------------------------
| AUTH (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    $produkLanding = Produk::with('kategori')
        ->orderBy('nama')
        ->get();

    $kategoriLanding = $produkLanding
        ->pluck('kategori.nama')
        ->filter()
        ->unique()
        ->values();

    $totalProdukLanding = Produk::count();

    return view('login.home', compact(
        'totalProdukLanding',
        'produkLanding',
        'kategoriLanding'
    ));
})->name('landing');

// Login page
Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/about', function () {
    return view('login.about');
})->name('about');

Route::get('/product', function () {
    return view('login.product');
})->name('product');

// Proses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Forgot password
Route::get('/forgot-password', function () {
    return view('login.forgot-password');
})->name('password.request');

// Register page
Route::get('/register', function () {
    return view('login.register');
})->name('register');

// Proses register
Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:3'
    ]);

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'id_level' => 2
    ]);

    return back()->with('register_success', true);

})->name('register.store');


/*
|--------------------------------------------------------------------------
| SEMUA HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {

    if (Auth::user()->level->kode == 'ADM') {
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();

        $totalSubKategori = Produk::query()
            ->whereNotNull('sub_kategori')
            ->pluck('sub_kategori')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->count();

        $totalLokasiPenggunaan = Produk::query()
            ->whereNotNull('lokasi_penggunaan')
            ->pluck('lokasi_penggunaan')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->count();

        $totalKebutuhan = Produk::query()
            ->whereNotNull('kelebihan')
            ->pluck('kelebihan')
            ->map(fn ($item) => array_map('trim', explode(',', $item)))
            ->flatten()
            ->filter()
            ->unique()
            ->count();

        return view('dashboard.admin', compact(
            'totalProduk',
            'totalKategori',
            'totalSubKategori',
            'totalLokasiPenggunaan',
            'totalKebutuhan'
        ));
    } else {
        return view('dashboard.user');
    }

})->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile.index');
    Route::put('/profile', [UserController::class, 'updateProfile'])
        ->name('profile.update');

    Route::get('/katalog', [ProdukController::class, 'catalog'])
        ->name('katalog.index');


    Route::middleware('role:ADM')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */
    Route::resource('produk', ProdukController::class);


    Route::resource('kategori', KategoriController::class);

    /*
    |--------------------------------------------------------------------------
    | KATEGORI 🔥 (BARU)
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | REKOMENDASI
    |--------------------------------------------------------------------------
    */
    });

    Route::middleware('role:USR')->group(function () {
        Route::get('/rekomendasi', [RekomendasiController::class, 'index'])
            ->name('rekomendasi.index');

        Route::post('/rekomendasi', [RekomendasiController::class, 'store'])
            ->name('rekomendasi.store');

        Route::get('/riwayat-input', [RekomendasiController::class, 'history'])
            ->name('rekomendasi.history');

        Route::get('/riwayat-input/{id}', [RekomendasiController::class, 'historyShow'])
            ->name('rekomendasi.history.show');
    });


    /*
    |--------------------------------------------------------------------------
    | LEVEL
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:ADM')->group(function () {

    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::get('/level/{id}', [LevelController::class, 'show'])->name('level.show');
    Route::get('/level/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');


    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    });

});
