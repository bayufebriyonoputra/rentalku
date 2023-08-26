<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Karyawan;
use App\Models\Transaksi;
use App\Models\Pengambilan;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;

class PengambilanController extends Controller
{
    public function index()
    {
        return view('transaksi.penagmbilan.cari_nota');
    }

    public function detailSewa(Request $request)
    {

        $detail_transaksi = DetailTransaksi::where('no_nota', $request->no_nota)->with('tipe')->get();
        $pengambilan = Pengambilan::where('no_nota', $request->no_nota)->with('karyawan')->get();
        return view('transaksi.pengambilan.detail', [
            'transaksi' => Transaksi::where('no_nota', $request->no_nota)->first(),
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim'),
            'karyawan' => Karyawan::all(),
            'pengambilan' => $pengambilan
        ]);
    }

    public function tambahPengambil(Request $request)
    {

        // Ambil Total komisi
        $detail = DetailTransaksi::where('no_nota', $request->no_nota)->with('tipe')->get();
        $total_komisi = $detail->sum('tipe.komisi_ambil');



        //Ambil Total Pengambil
        $pengambilan = Pengambilan::where('no_nota', $request->no_nota)->get();
        $total_pengambilam = $pengambilan->count() + 1;

        // Insert Data Pengambil Baru
        Pengambilan::create([
            'no_nota' => $request->no_nota,
            'karyawan_id' => $request->karyawan_id,
            'komisi' => $total_komisi / $total_pengambilam
        ]);

        // Update Komisi
        Pengambilan::where('no_nota', $request->no_nota)
            ->update([
                'komisi' => $total_komisi / $total_pengambilam
            ]);

        return back()->with('success', 'Pengirim ditambahkan');
    }

    public function hapusPengambil(Pengambilan $pengambil, Request $request)
    {
        $pengambil->delete();

        // Ambil Total komisi
        $detail = DetailTransaksi::where('no_nota', $request->no_nota)->with('tipe')->get();
        $total_komisi = $detail->sum('tipe.komisi_ambil');

        //Ambil Total Pengambilan
        $pengambilan = Pengambilan::where('no_nota', $request->no_nota)->get();
        $total_pengambilan = $pengambilan->count();



        // Update Komisi
        Pengambilan::where('no_nota', $request->no_nota)
            ->update([
                'komisi' => $total_komisi / $total_pengambilan
            ]);

        return back()->with('success', 'Pengirim dihapus');
    }
    public function ambil(Transaksi $transaksi)
    {
        $transaksi->update(
            [
                'status_pengambilan' => 'Diambil'
            ]
        );

        return back()->with('success', 'Status barang diubah menjadi Diambil');
    }
}
