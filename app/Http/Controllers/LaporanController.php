<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksiSewa()
    {
        $transaksi = Transaksi::all();

        return view('laporan.transaksi_sewa', [
            'transaksi' => $transaksi
        ]);
    }

    public function komisiKirim()
    {
        $transaksi = Transaksi::all();
        return view('laporan.komisi_kirim', [
            'transaksi' => $transaksi
        ]);
    }

    public function absensi()
    {
        $absensi = Absensi::with('karyawan')->get();
        return view('laporan.absensi_karyawan', [
            'absensi' => $absensi
        ]);
    }

    public function jadwalAmbil()
    {
        $transaksi = Transaksi::with('pelanggan')->get();
        return view('laporan.jadwal_pengambilan',[
            'transaksi' => $transaksi
        ]);
    }
    public function jadwalKirim()
    {
        $transaksi = Transaksi::with('pelanggan')->get();
        return view('laporan.jadwal_kirim',[
            'transaksi' => $transaksi
        ]);
    }
}
