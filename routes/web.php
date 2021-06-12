<?php

use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\KomentarController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    //Halaman Admin
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    // admin barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    // admin detail barang
    Route::get('/barang/detail/{id_brg}', [BarangController::class, 'detail']);
    // admin add barang
    Route::get('/barang/add', [BarangController::class, 'add']);
    // admin add barang insert
    Route::post('/barang/insert', [BarangController::class, 'insert']);
    // admin edit barang
    Route::get('/barang/edit/{id_brg}', [BarangController::class, 'edit']);
    // admin add barang insert
    Route::post('/barang/update/{id_brg}', [BarangController::class, 'update']);
    // admin hapus barang
    Route::get('/barang/delete/{id_brg}', [BarangController::class, 'delete']);
    // admin print data barang
    Route::get('/barang/print', [BarangController::class, 'print']);
    // admin printpdf data barang
    Route::get('/barang/printpdf', [BarangController::class, 'printpdf']);
    // admin pembelian
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    // admin tampil data komentar user
    Route::get('/komentar', [DashboardController::class, 'indexkomentar'])->name('komentar');
    // admin hapus komentar
    Route::get('/komentar/delete/{id}', [DashboardController::class, 'delete']);
});



//Halaman User
Route::get('/pt_delaval', [UserDashboardController::class, 'index']);
// user detail barang
Route::get('/detail/barang/{id_brg}', [UserDashboardController::class, 'detail']);
// user Kontak Kami
Route::get('/kontak', [UserDashboardController::class, 'kontak'])->name('kontak');

Route::group(['middleware' => 'auth'], function () {
    // user tambah komentar Kami
    Route::post('/kontak/insert', [KomentarController::class, 'insert']);
});
// user Tentang Kami
Route::get('/about', [UserDashboardController::class, 'about']);
// user produk Kami
Route::get('/produk', [UserDashboardController::class, 'produk']);
// user keranjang Kami
Route::group(
    ['middleware' => 'auth'],
    function () {
Route::get('/keranjang', [UserDashboardController::class, 'keranjang'])->name('keranjang');
// user tambah keranjang Kami
Route::get('/keranjang/tambah/{id}', [UserDashboardController::class, 'tambah_keranjang']);
// user hapus semua keranjang
Route::get('/hapuskeranjang', [UserDashboardController::class, 'hapus_keranjang'])->name('hapuskeranjang');
// user tambah satuan pada tombol plus keranjang
Route::get('/tambah/{id}', [UserDashboardController::class, 'tambah']);
// user kurang satuan pada tombol minus keranjang
Route::get('/kurang/{id}', [UserDashboardController::class, 'kurang']);
// user pembayaran
Route::get('/pembayaran', [UserDashboardController::class, 'pembayaran']);
// user bayar
Route::get('/bayar', [UserDashboardController::class, 'bayar']);
    }
);
