<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksiSewa(Request $request)
    {


        $transaksi = Transaksi::all();
        $pelanggan = Pelanggan::all();

        if($request->tanggal_awal && $request->tanggal_akhir){
            $transaksi = $transaksi->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if($request->status_pengiriman && $request->status_pengiriman !== 'semua'){
            $transaksi = $transaksi->where('status_pengiriman', 'Dikirim');

        }
        if($request->penyewa && $request->penyewa !== 'semua'){
            $transaksi = $transaksi->where('pelanggan_id', $request->penyewa);

        }

        return view('laporan.transaksi_sewa', [
            'transaksi' => $transaksi,
            'pelanggan' => $pelanggan,
            'tanggal_awal' => $request->tanggal_awal ?? null,
            'tanggal_akhir' => $request->tanggal_akhir ?? null,
            'status_pengiriman' => $request->status_pengiriman ?? null,
            'penyewa' => $request->penyewa ?? null
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
