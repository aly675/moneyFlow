<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\UserIsAuthenticated;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\PemasukanPengeluaranController;

// Rute untuk dashboard
Route::middleware([UserIsAuthenticated::class])->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/', [IndexController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/data', [IndexController::class, 'getData'])->name('dashboard.data');

    // Route untuk menyimpan pemasukan
    Route::get('/pemasukan', function(){
        return view('pemasukan');
    })->name('pemasukan_page');
    Route::post('/simpan-pemasukan', [PemasukanPengeluaranController::class, 'simpanPemasukan'])->name('simpan.pemasukan');

    Route::get('/pengeluaran', function(){
        return view('pengeluaran');
    })->name('pengeluaran_page');
    Route::post('/simpan-pengeluaran', [PemasukanPengeluaranController::class, 'simpanPengeluaran'])->name('simpan.pengeluaran');

    Route::prefix('/menejemen_anggaran')->group(function(){
        Rou
    });
});

// Terapkan middleware RedirectIfAuthenticated pada rute login dan registrasi
Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_page');
    Route::post('/login', [AuthController::class, 'login'])->name('login_submit');

    // Register Routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register_page');
    Route::post('/register', [AuthController::class, 'register'])->name('register_submit');
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
