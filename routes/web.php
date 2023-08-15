<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Transaksi\PengirimanBarangController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\Transaksi\AbsensiController;
use App\Http\Controllers\Transaksi\PinjamanController;
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Models\Karyawan;
use App\Models\Merk;
use App\Models\Tipe;
use Illuminate\Http\Request;

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
    return view('login');
})->name('login');
Route::get('/tes', function () {
    return view('admin.main');
});

// Route API
Route::get('/getMerk', function(Request $request){
    $merk = Merk::where('kategori_id', $request->KategoriId)->get()->pluck('id', 'merk');
    return response()->json($merk);
});
Route::get('/getTipe', function(Request $request){
    $tipe = Tipe::where('merk_id', $request->merk_id)->get()->pluck('id', 'tipe');
    return response()->json($tipe);
});
Route::get('/tipeDetail', function(Request $request){
    $tipe = Tipe::where('id', $request->tipe_id)->first();
    return response()->json($tipe);
});
Route::get('/getKaryawan', function(Request $request){
    $karyawan = Karyawan::where('id', $request->karyawan_id)->first();
    return response()->json($karyawan);
});

//Login Route
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Admin Route

//User Route
Route::resource('/admin-user', UserController::class)->parameters(['admin-user'=> 'user'])->middleware('admin');

// Karyawan Route

// Kategori
Route::resource('/kategori', KategoriController::class)->middleware('auth');
// Merk
Route::resource('/merk', MerkController::class)->middleware('auth');
// Tipe
Route::resource('/tipe', TipeController::class)->middleware('auth');
// Karyawan
Route::resource('/karyawan', KaryawanController::class)->middleware('auth');
// Pelanggan
Route::resource('/pelanggan', PelangganController::class)->middleware('auth');

// Transaksi
Route::get('/transaksi-sewa', [TransaksiController::class, 'listTransaksiSewa'])->middleware('auth');
Route::post('/transaksi-sewa', [TransaksiController::class, 'storeSewa'])->middleware('auth');
Route::get('/transaksi-sewa/{transaksi}/edit', [TransaksiController::class, 'detailSewa'])->middleware('auth');
Route::post('/transaksi-sewa/detailOrder', [TransaksiController::class, 'isiDetailOrder'])->middleware('auth');
Route::post('/transaksi-sewa/detailOrder/update', [TransaksiController::class, 'updateOrder'])->middleware('auth');
Route::delete('/transaksi-sewa/detailOrder/{id}', [TransaksiController::class, 'hapusOrdet'])->middleware('auth');

// Transaksi Pengiriman Barang
Route::get('/pengiriman', [PengirimanBarangController::class,'index'])->middleware('auth');
Route::get('/pengiriman/cari', [PengirimanBarangController::class,'detailSewa'])->middleware('auth');
Route::post('/pengiriman/kirim', [PengirimanBarangController::class,'siapKirim'])->middleware('auth')->name('pengiriman');

// Absensi
Route::resource('/absensi', AbsensiController::class)->middleware('auth');

// Pinjaman
Route::get('/pinjaman', [PinjamanController::class, 'index'])->middleware('auth');
Route::post('/pinjaman', [PinjamanController::class, 'store'])->middleware('auth');
Route::delete('/pinjaman/{pinjaman}', [PinjamanController::class, 'destroy'])->middleware('auth');
