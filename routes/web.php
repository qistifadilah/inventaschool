<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    JenisController,
    RuangController,
    InventarisController,
    PeminjamanController,
    ProfileController,
    PetugasController,
    AuthController,
    GenerateController,
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

Route::get('/peminjaman/{peminjaman}/print', [GenerateController::class, 'generatePDF'])->name('cetak');

Route::get('/', [AuthController::class, 'homepage'])->middleware('guest')->name('auth.homepage');

Route::middleware(['auth', 'can:isUser'])->group(
    function () {
        Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
        Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    }
);

Route::middleware(['auth', 'can:isPetugas'])->group(
    function () {
        Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
        Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
        Route::get('/inventaris/{inventari}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
        Route::put('/inventaris/{inventari}', [InventarisController::class, 'update'])->name('inventaris.update');
        
        Route::put('/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::get('/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    }
);

Route::middleware(['auth', 'can:isAdmin'])->group(
    function () {
        // ->except(['store', 'update', 'edit'])
        Route::resource('peminjaman', PeminjamanController::class);
        Route::resource('inventaris', InventarisController::class);
        Route::delete('/inventaris/{inventari}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');
        Route::delete('/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    }
);

Route::get('/inventaris/{inventari}', [InventarisController::class, 'show'])->name('inventaris.show');
Route::get('/peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show')->middleware('auth');
Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index')->middleware('auth');
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])->name('auth.profile')->middleware('auth');
Route::resource('/petugas', PetugasController::class)->middleware(['can:isAdmin', 'auth']);
Route::get('/pegawai', [PetugasController::class, 'pegawai'])->name('pegawai')->middleware(['can:isAdmin', 'auth']);
Route::resource('/jenis', JenisController::class)->middleware(['can:isAdmin', 'auth']);
Route::resource('/ruang', RuangController::class)->middleware(['can:isAdmin', 'auth']);

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
