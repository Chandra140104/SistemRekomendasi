<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| AUTH (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('login.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| SEMUA HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.admin');
    })->name('dashboard');

    // Produk
    Route::resource('produk', ProdukController::class);

    // Rekomendasi
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])
        ->name('rekomendasi.index');

    Route::post('/rekomendasi', [RekomendasiController::class, 'store'])
        ->name('rekomendasi.store');

    Route::get('/rekomendasi/{id}/show', [RekomendasiController::class, 'show'])
        ->name('rekomendasi.show');

    // Level
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::get('/level/{id}', [LevelController::class, 'show'])->name('level.show');
    Route::get('/level/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

});