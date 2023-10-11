<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\TransaksiSuratController;

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

// Jika belom login, maka muncul
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Jika sudah login, kembali ke dalam halaman ya
Route::get('/home', function () {
    return redirect('dashboard/surat');
});

Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::prefix('dashboard')->middleware(['akses:admin,operator'])->group(function () {
        Route::get('/surat', [DashboardController::class, 'index']);
        Route::get('/surat/tambah', [DashboardController::class, 'create']);
        Route::post('/surat/simpan', [DashboardController::class, 'store']);
        Route::get('/surat/edit/{id}', [DashboardController::class, 'edit']);
        Route::post('/surat/edit/simpan', [DashboardController::class, 'update']);
        Route::delete('/surat/hapus', [DashboardController::class, 'destroy']);
    });

    // MANAGE USER
    Route::prefix('admin')->middleware(['akses:admin'])->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/tambah', [UserController::class, 'create']);
        Route::post('/user/simpan', [UserController::class, 'store']);
        Route::get('/user/edit/{id}', [UserController::class, 'edit']);
        Route::post('/user/edit/simpan', [UserController::class, 'update']);
        Route::delete('/user/hapus', [UserController::class, 'destroy']);
    });

    // MANAGE JENIS SURAT
    Route::prefix('jenis')->middleware(['akses:admin'])->group(function () {
        Route::get('/surat', [JenisSuratController::class, 'index']);
        Route::get('/surat/tambah', [JenisSuratController::class, 'create']);
        Route::post('/surat/simpan', [JenisSuratController::class, 'store']);
        Route::get('/surat/edit/{id}', [JenisSuratController::class, 'edit']);
        Route::post('/surat/edit/simpan', [JenisSuratController::class, 'update']);
        Route::delete('/surat/hapus', [JenisSuratController::class, 'destroy']);
    });

    // TRANSAKSI SURAT
    Route::prefix('transaksi')->middleware(['akses:admin,operator'])->group(function () {
        Route::get('/surat', [TransaksiSuratController::class, 'index']);
        Route::post('/surat/hapus', [TransaksiSuratController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
