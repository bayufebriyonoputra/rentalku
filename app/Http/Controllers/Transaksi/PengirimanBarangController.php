<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;

class PengirimanBarangController extends Controller
{
    public function index()
    {
        return view('transaksi.pengiriman.cari_nota');
    }

    public function detailSewa(Request $request)
    {

        $detail_transaksi = DetailTransaksi::where('no_nota', $request->no_nota)->with('tipe')->get();
        return view('transaksi.pengiriman.detail', [
            'transaksi' => Transaksi::where('no_nota', $request->no_nota)->first(),
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim'),
            'karyawan' => Karyawan::all()
        ]);

    }

    public function siapKirim(Request $request)
    {
        // dd($request->selectedData);


        DetailTransaksi::whereIn('id', $request->selectedData)
        ->update([
            'karyawan_id' => $request->karyawanId
        ]);
        $detail_transaksi = DetailTransaksi::where('no_nota', $request->no_nota)->get();

        if($detail_transaksi->count() == $detail_transaksi->whereNotNull('karyawan_id')->count()){
            Transaksi::where('no_nota', $request->no_nota)
            ->update([
                'status_pengiriman' => 'Dikirim'
            ]);

        }
        $updatedData = DetailTransaksi::whereIn('id', $request->selectedData)->get();
        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $updatedData]);
    }
}
