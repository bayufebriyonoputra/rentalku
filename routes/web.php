<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TipeController;
use App\Models\Merk;
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

//Login Route
Route::post('/login', [LoginController::class, 'login']);

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
