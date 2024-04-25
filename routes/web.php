<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Routing\Router;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authentication'])->middleware('guest');
Route::post('registrasi', [AuthController::class, 'signUp']);
Route::get('registrasi', function(){
    return view('Auth.register');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'dashboardPelanggan'])->name('dashboardPelanggan');
    Route::get('/dashboard', [DashboardController::class, 'filterByDate'])->name('dashboard');

    Route::get('kategori', [CategoryController::class, 'halamanKategori']);
    Route::post('kategori', [CategoryController::class, 'simpanKategori']);
    Route::put('kategori/{id}', [CategoryController::class, 'editKategori']);
    Route::get('kategori/{id}', [CategoryController::class, 'hapusKategori']);

    Route::get('produk', [ProductController::class, 'halamanProduk']);
    Route::post('produk', [ProductController::class, 'simpanProduk']);
    Route::put('produk/{id}', [ProductController::class, 'editProduk']);
    Route::get('produk/{id}', [ProductController::class, 'hapusProduk']);

    Route::get('detailProduk/{id}', [DashboardController::class, 'detailProduk']);
    Route::post('order/{id}', [OrderController::class, 'pembelian'])->name('pembelian');
    Route::get('order', [OrderController::class, 'halamanOrder'])->name('order');
    Route::put('melengkapiOrder/{id}', [OrderController::class, 'melengkapiOrder'])->name('melengkapiOrder');
    Route::get('hapusOrder/{id}', [OrderController::class, 'hapusOrder']);

    Route::get('kelolaOrder', [OrderController::class, 'kelolaOrder']);
    Route::get('produk-dashboard', [DashboardController::class, 'produkDashboard'])->name('produk-dashboard');

    //cetak nota
    Route::get('cetakNota/{id}', [DashboardController::class, 'cetakNota']);
    Route::get('cetakInvoice/{id}', [DashboardController::class, 'cetakInvoice']);

    //riwayat pembelian
    Route::get('riwayatPembelian', [OrderController::class, 'halamanRiwayatPembelian'])->name('riwayatPembelian');

    Route::get('cetakLaporan', [DashboardController::class, 'cetakPenjualan']);
    Route::get('/export-pdf-by-date', [DashboardController::class, 'exportPDFByDate'])->name('export.pdf.by.date');

});
