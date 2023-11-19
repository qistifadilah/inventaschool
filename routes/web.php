<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    JenisController,
    RuangController,
    InventarisController,
    PeminjamanController,
    LaporanController,
    AuthController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/jenis', JenisController::class);
Route::resource('/ruang', RuangController::class);
Route::resource('/inventaris', InventarisController::class);
Route::resource('/peminjaman', PeminjamanController::class);
Route::resource('/laporan', LaporanController::class);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::controller(AuthController::class)->group(function () {
    //register form
    Route::get('/register', 'register')->name('auth.register');

    //store register
    Route::post('/register', 'store')->name('auth.store');

    //login form
    Route::get('/login', 'login')->name('auth.login');

    //auth process
    Route::post('/auth', 'auth')->name('auth.authentication');

    //logout
    Route::post('/logout', 'logout')->name('auth.logout');

    //dashboard
    Route::get('/dashboard', 'dashboard')->name('auth.dashboard');
});
