<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiPenggunaanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KebutuhanController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\UserController;
use App\Models\InputRekomendasi;
use App\Models\Kategori;
use App\Models\Kebutuhan;
use App\Models\LokasiPenggunaan;
use App\Models\Produk;
use App\Models\SubKategori;

/*
|--------------------------------------------------------------------------
| AUTH (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    $produkLanding = Produk::with([
        'kategori',
        'subKategori',
        'lokasiPenggunaan',
        'kebutuhan',
    ])
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

Route::get('/penjelasan-kategori-produk/', function () {
    return view('login.product');
})->name('penjelasan-kategori-produk');

Route::get('/penjelasan-sub-kategori', function () {
    return view('login.product');
})->name('penjelasan-sub-kategori');

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
Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])
    ->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');

// Register page
Route::get('/register', function () {
    return view('login.register');
})->name('register');

// Proses register
Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'no_telp' => 'required|string|max:30',
        'perusahaan_instansi' => 'nullable|string|max:100',
        'divisi_jabatan' => 'nullable|string|max:100',
        'provinsi' => 'required|string|max:100',
        'kota_kabupaten' => 'required|string|max:100',
        'password' => 'required|confirmed|min:3'
    ]);

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
        'perusahaan_instansi' => $request->perusahaan_instansi,
        'divisi_jabatan' => $request->divisi_jabatan,
        'provinsi' => $request->provinsi,
        'kota_kabupaten' => $request->kota_kabupaten,
        'lokasi_kota' => trim($request->provinsi . ', ' . $request->kota_kabupaten, ', '),
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
        $threshold = 0.5;
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $produkList = Produk::with([
            'kategori',
            'subKategori',
            'lokasiPenggunaan',
            'kebutuhan',
        ])->get();
        $riwayatInput = InputRekomendasi::all();
        $totalSubKategori = SubKategori::count();
        $totalLokasiPenggunaan = LokasiPenggunaan::count();
        $totalKebutuhan = Kebutuhan::count();

        $normalizeValues = function (?string $value): array {
            if (! $value) {
                return [];
            }

            return collect(explode(',', $value))
                ->map(fn ($item) => trim($item))
                ->filter()
                ->unique()
                ->values()
                ->all();
        };

        $buildKeywords = function (array $items): array {
            return collect($items)
                ->flatten()
                ->map(fn ($item) => trim((string) $item))
                ->filter()
                ->unique()
                ->values()
                ->all();
        };

        $countEntries = function ($items) {
            return collect($items)
                ->map(fn ($item) => trim((string) $item))
                ->filter()
                ->countBy()
                ->sortDesc()
                ->take(5)
                ->map(fn ($total, $nama) => [
                    'nama' => $nama,
                    'total' => $total,
                ])
                ->values();
        };

        $topProdukCounts = [];

        foreach ($riwayatInput as $input) {
            $userKeywords = $buildKeywords([
                $input->kategori,
                $input->sub_kategori,
                $normalizeValues($input->lokasi_penggunaan),
                $normalizeValues($input->kelebihan),
            ]);

            $bi = count($userKeywords);

            foreach ($produkList as $produk) {
                $productKeywords = $buildKeywords([
                    $produk->kategori->nama ?? null,
                    $normalizeValues($produk->sub_kategori),
                    $normalizeValues($produk->lokasi_penggunaan),
                    $normalizeValues($produk->kelebihan),
                ]);

                $bj = count($productKeywords);
                $totalItem = $bi + $bj;

                if ($totalItem === 0) {
                    continue;
                }

                $matchedKeywords = array_intersect($userKeywords, $productKeywords);
                $score = (2 * count($matchedKeywords)) / $totalItem;

                if ($score >= $threshold) {
                    $topProdukCounts[$produk->id_produk]['nama'] = $produk->nama;
                    $topProdukCounts[$produk->id_produk]['total'] = ($topProdukCounts[$produk->id_produk]['total'] ?? 0) + 1;
                }
            }
        }

        $topProdukRekomendasi = collect($topProdukCounts)
            ->sortByDesc('total')
            ->take(10)
            ->values();

        $topKategoriRekomendasi = $countEntries(
            $riwayatInput->pluck('kategori')
        );

        $topSubKategoriRekomendasi = $countEntries(
            $riwayatInput->pluck('sub_kategori')
        );

        $topLokasiPenggunaanRekomendasi = $countEntries(
            $riwayatInput->pluck('lokasi_penggunaan')
                ->flatMap($normalizeValues)
        );

        $topKebutuhanRekomendasi = $countEntries(
            $riwayatInput->pluck('kelebihan')
                ->flatMap($normalizeValues)
        );

        return view('dashboard.admin', compact(
            'totalProduk',
            'totalKategori',
            'totalSubKategori',
            'totalLokasiPenggunaan',
            'totalKebutuhan',
            'topProdukRekomendasi',
            'topKategoriRekomendasi',
            'topSubKategoriRekomendasi',
            'topLokasiPenggunaanRekomendasi',
            'topKebutuhanRekomendasi'
        ));
    } else {
        return view('dashboard.user');
    }

})->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile.index');
    Route::put('/profile', [UserController::class, 'updateProfile'])
        ->name('profile.update');

    Route::middleware('role:ADM')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */
    Route::resource('produk', ProdukController::class);


    Route::resource('kategori', KategoriController::class);
    Route::resource('sub-kategori', SubKategoriController::class);
    Route::resource('lokasi-penggunaan', LokasiPenggunaanController::class);
    Route::resource('kebutuhan', KebutuhanController::class);

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
        Route::get('/katalog', [ProdukController::class, 'catalog'])
            ->name('katalog.index');

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
