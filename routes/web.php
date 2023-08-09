<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;

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

//Login Route
Route::post('/login', [LoginController::class, 'login']);

// Admin Route

//User Route
Route::resource('/admin-user', UserController::class)->parameters(['admin-user'=> 'user'])->middleware('admin');

// Karyawan Route

// Kategori
Route::resource('/kategori', KategoriController::class)->middleware('auth');
