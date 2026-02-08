<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
/*
|--------------------------------------------------------------------------
| AUTH
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
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Produk
|--------------------------------------------------------------------------
*/
Route::resource('produk', ProdukController::class);

Route::get('/rekomendasi', [RekomendasiController::class, 'index'])
    ->name('rekomendasi.index');

Route::post('/rekomendasi', [RekomendasiController::class, 'store'])
    ->name('rekomendasi.store');

Route::get('/rekomendasi/{id}/show', [RekomendasiController::class, 'show'])
    ->name('rekomendasi.show');