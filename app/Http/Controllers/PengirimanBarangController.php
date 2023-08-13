<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanBarangController extends Controller
{
    public function index()
    {
        return view('transaksi.pengiriman.cari_nota');
    }
}
