<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksiSewa(Request $request)
    {


        $transaksi = Transaksi::all();
        $pelanggan = Pelanggan::all();

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $transaksi = $transaksi->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->status_pengiriman && $request->status_pengiriman !== 'semua') {
            $transaksi = $transaksi->where('status_pengiriman', 'Dikirim');
        }
        if ($request->penyewa && $request->penyewa !== 'semua') {
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

    public function komisiKirim(Request $request)
    {
        $transaksi = Transaksi::all();
        $pelanggan = Pelanggan::all();

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $transaksi = $transaksi->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }


        if ($request->penyewa && $request->penyewa !== 'semua') {
            $transaksi = $transaksi->where('pelanggan_id', $request->penyewa);
        }
        return view('laporan.komisi_kirim', [
            'transaksi' => $transaksi,
            'pelanggan' => $pelanggan,
            'tanggal_awal' => $request->tanggal_awal ?? null,
            'tanggal_akhir' => $request->tanggal_akhir ?? null,
            'penyewa' => $request->penyewa ?? null
        ]);
    }

    public function absensi(Request $request)
    {
        $absensi = Absensi::with('karyawan')->get();
        $karyawan = Karyawan::all();

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $absensi = $absensi->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }


        if ($request->karyawan && $request->karyawan !== 'semua') {
            $absensi = $absensi->where('karyawan_id', $request->karyawan);
        }
        return view('laporan.absensi_karyawan', [
            'absensi' => $absensi,
            'karyawan' => $karyawan,
            'karyawan_id' => $request->karyawan ?? null,
            'tanggal_awal' => $request->tanggal_awal ?? null,
            'tanggal_akhir' => $request->tanggal_akhir ?? null,
        ]);
    }

    public function jadwalAmbil(Request $request)
    {
        $transaksi = Transaksi::with('pelanggan')->whereDate('created_at', today())->get();
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $transaksi = $transaksi->whereBetween('tanggal_ambil', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->status_pengambilan && $request->status_pengambilan !== 'semua') {
            $transaksi = $transaksi->where('status_pengambilan', 'Diambil');
        }
        return view('laporan.jadwal_pengambilan', [
            'transaksi' => $transaksi,
            'status_pengambilan' => $request->status_pengambilan ?? null,
            'tanggal_awal' => $request->tanggal_awal ?? null,
            'tanggal_akhir' => $request->tanggal_akhir ?? null,
        ]);
    }
    public function jadwalKirim(Request $request)
    {
        $transaksi = Transaksi::with('pelanggan')->whereDate('created_at', today())->get();
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $transaksi = $transaksi->whereBetween('tanggal_kirim', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->status_pengiriman && $request->status_pengiriman !== 'semua') {
            $transaksi = $transaksi->where('status_pengiriman', 'Dikirim');
        }
        return view('laporan.jadwal_kirim', [
            'transaksi' => $transaksi,
            'status_pengiriman' => $request->status_pengiriman ?? null,
            'tanggal_awal' => $request->tanggal_awal ?? null,
            'tanggal_akhir' => $request->tanggal_akhir ?? null,
        ]);
    }
}
