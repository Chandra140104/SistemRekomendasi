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

/*
|--------------------------------------------------------------------------
| AUTH (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

// Login page
Route::get('/', function () {
    return view('login.login');
})->name('login');

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
        return view('dashboard.admin');
    } else {
        return view('dashboard.user');
    }

})->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile.index');


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
