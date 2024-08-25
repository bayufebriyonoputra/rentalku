<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Transaksi\PengirimanBarangController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\Transaksi\AbsensiController;
use App\Http\Controllers\Transaksi\GajiKaryawan;
use App\Http\Controllers\Transaksi\PengambilanController;
use App\Http\Controllers\Transaksi\PinjamanController;
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Livewire\MasterData\PaketController as MasterDataPaketController;
use App\Livewire\Transaksi\DetailTransaksi;
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
    return view('landing_page');
});

Route::get('/login', function(){
    return view('login_2');
})->name('login');
Route::get('/tes', function () {
    return view('nota.penyewaan_barang3');
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

// Paket
Route::get('/paket', [PaketController::class,'index'])->middleware('auth');
Route::post('/paket', [PaketController::class,'store'])->middleware('auth');
Route::put('/paket/{paket}', [PaketController::class,'update'])->middleware('auth');
Route::delete('/paket/{paket}', [PaketController::class,'destroy'])->middleware('auth');
Route::get('/paket/edit/{paket}', [PaketController::class,'edit'])->middleware('auth');
Route::get('/paket/{paket}', MasterDataPaketController::class)->middleware('auth');
Route::post('/paket/detail', [PaketController::class,'storeDetailPaket'])->middleware('auth');
Route::delete('/paket/detail/{detail_paket}', [PaketController::class,'destroyDetail'])->middleware('auth');

// Transaksi
Route::get('/transaksi-sewa', [TransaksiController::class, 'listTransaksiSewa'])->middleware('auth');
Route::post('/transaksi-sewa', [TransaksiController::class, 'storeSewa'])->middleware('auth');
Route::delete('/transaksi-sewa/hapus/{transaksi}', [TransaksiController::class, 'destroy'])->middleware('auth');
Route::get('/transaksi-sewa/{transaksi}/edit', DetailTransaksi::class)->middleware('auth');
Route::post('/transaksi-sewa/detailOrder', [TransaksiController::class, 'isiDetailOrder'])->middleware('auth');
Route::post('/transaksi-sewa/detailOrder/paket', [TransaksiController::class, 'isiDetailOrderPaket'])->middleware('auth');
Route::post('/transaksi-sewa/detailOrder/update', [TransaksiController::class, 'updateOrder'])->middleware('auth');
Route::delete('/transaksi-sewa/detailOrder/{id}', [TransaksiController::class, 'hapusOrdet'])->middleware('auth');

// Transaksi Pengiriman Barang
Route::get('/pengiriman', [PengirimanBarangController::class,'index'])->middleware('auth');
Route::post('/pengiriman/kirim/{transaksi}', [PengirimanBarangController::class,'kirim'])->middleware('auth');
Route::get('/pengiriman/cari', [PengirimanBarangController::class,'detailSewa'])->middleware('auth');
Route::post('/pengiriman/tambah-pengirim', [PengirimanBarangController::class,'tambahPengirim'])->middleware('auth')->name('pengiriman');
Route::delete('/pengiriman/hapus-pengirim/{pengirim}', [PengirimanBarangController::class,'hapusPengirim'])->middleware('auth')->name('pengiriman');

// Transaksi Pengambilan Barang
Route::get('/pengambilan', [PengambilanController::class, 'index'])->middleware('auth');
Route::get('/pengambilan/cari', [PengambilanController::class, 'detailSewa'])->middleware('auth');
Route::post('/pengambilan/tambah-pengambil', [PengambilanController::class, 'tambahPengambil'])->middleware('auth');
Route::delete('/pengambilan/hapus-pegambil/{pengambil}', [PengambilanController::class, 'hapusPengambil'])->middleware('auth');
Route::post('/pengambilan/ambil/{transaksi}', [PengambilanController::class, 'ambil'])->middleware('auth');

// Absensi
Route::resource('/absensi', AbsensiController::class)->middleware('auth');

// Gaji
Route::get('/gaji', [GajiKaryawan::class, 'index'])->middleware('auth');
Route::post('/gaji', [GajiKaryawan::class, 'store'])->middleware('auth');
Route::delete('/gaji/{gaji}', [GajiKaryawan::class, 'destroy'])->middleware('auth');
Route::get('/getPinjaman', [GajiKaryawan::class, 'getPinjaman'])->middleware('auth');

// Pinjaman
Route::get('/pinjaman', [PinjamanController::class, 'index'])->middleware('auth');
Route::post('/pinjaman', [PinjamanController::class, 'store'])->middleware('auth');
Route::delete('/pinjaman/{pinjaman}', [PinjamanController::class, 'destroy'])->middleware('auth');

// Laporan
Route::get('/laporan/transaksi-sewa',[LaporanController::class,'transaksiSewa'])->middleware('auth');
Route::get('/laporan/komisi-kirim',[LaporanController::class,'komisiKirim'])->middleware('auth');
Route::get('/laporan/absensi',[LaporanController::class,'absensi'])->middleware('auth');
Route::get('/laporan/jadwal-ambil',[LaporanController::class,'jadwalAmbil'])->middleware('auth');
Route::get('/laporan/jadwal-kirim',[LaporanController::class,'jadwalKirim'])->middleware('auth');

// Cetak Nota
Route::get('/nota/penyewaan/{transaksi}', [TransaksiController::class, 'cetakNotaSewa2'])->middleware('auth');
Route::get('/nota/kirim/{transaksi}', [PengirimanBarangController::class, 'cetakNotaKirim2'])->middleware('auth');
Route::get('/nota/ambil/{transaksi}', [PengambilanController::class, 'cetakNotaAmbil'])->middleware('auth');
Route::get('/nota/komisi-kirim/{transaksi}', [PengirimanBarangController::class, 'cetakNotaKomisiKirim'])->middleware('auth');
Route::get('/nota/pelunasan/{transaksi}', [PengambilanController::class, 'cetakNotaLunas'])->middleware('auth');
Route::get('/nota/komisi-ambil/{transaksi}', [PengambilanController::class, 'cetakNotaKomisiAmbil'])->middleware('auth');
Route::get('/nota/slip/{gaji}', [GajiKaryawan::class, 'cetakSlip'])->middleware('auth');
