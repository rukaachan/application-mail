<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::middleware(['guest'])->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
// });

// // Jika sudah login, kembali ke dalam halaman ya
// Route::get('/home', function () {
//     return redirect('/admin');
// });


// Role and Permission
Route::middleware(['auth'])->group(function () {
    // Membuat sesi logout
    Route::get('/logout', [SessionController::class, 'logout']);

    // Admin
    Route::get('/admin', [AdminController::class, 'index']);

    // Route::get('/admin/admin', [UserController::class, 'admin'])->middleware('akses:admin');
    Route::get('/admin/operator', [AdminController::class, 'operator'])->middleware('akses:operator');
});

Route::prefix('manajemen')->middleware(['akses:admin'])->group(function () {
    Route::get('/user',[UserController::class,'admin']);
});