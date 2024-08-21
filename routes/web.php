<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminTransaksiDetailController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminReportDetailController;
use App\Http\Controllers\AdminDashboardController;
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

Route::get('/login', [AdminAuthController::class, 'index']);
Route::post('/login/do', [AdminAuthController::class, 'dologin']);
Route::get('/logout', [AdminAuthController::class, 'logout']);

Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
});

Route::prefix('/admin')->group(function(){
    Route::get('/dashboard', function (){
        $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
    });

    Route::get('/transaksi/detail/selesai/{id}', [AdminTransaksiDetailController::class, 'done']);
    Route::get('/transaksi/detail/delete', [AdminTransaksiDetailController::class, 'delete']);
    Route::get('/report/detail/{id}', [AdminTransaksiDetailController::class, 'index'])->name('admin.report.detail');
    Route::get('/report/download', [AdminReportController::class, 'download']);
    Route::post('/transaksi/detail/create', [AdminTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', AdminTransaksiController::class);
    Route::resource('/produk',AdminProdukController::class);
    Route::resource('/kategori',AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/report', AdminReportController::class);
});