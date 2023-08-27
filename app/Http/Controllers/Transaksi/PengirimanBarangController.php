<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Karyawan;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;

class PengirimanBarangController extends Controller
{
    public function index()
    {
        return view('transaksi.pengiriman.cari_nota');
    }

    public function detailSewa(Request $request)
    {

        $detail_transaksi = DetailTransaksi::where('no_nota', $request->no_nota)->with('tipe')->get();
        $pengiriman = Pengiriman::where('no_nota', $request->no_nota)->with('karyawan')->get();
        return view('transaksi.pengiriman.detail', [
            'transaksi' => Transaksi::where('no_nota', $request->no_nota)->first(),
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim'),
            'karyawan' => Karyawan::all(),
            'pengiriman' => $pengiriman
        ]);
    }

    public function tambahPengirim(Request $request)
    {

        // Ambil Total komisi
        $detail = DetailTransaksi::where('no_nota', $request->no_nota)->get();
        $total_komisi = $detail->sum('komisi_kirim');

        //Ambil Total Pengirim
        $pengirim = Pengiriman::where('no_nota', $request->no_nota)->get();
        $total_pengirim = $pengirim->count() + 1;

        // Insert Data Pengiriman Baru
        Pengiriman::create([
            'no_nota' => $request->no_nota,
            'karyawan_id' => $request->karyawan_id,
            'komisi' => $total_komisi / $total_pengirim
        ]);

        // Update Komisi
        Pengiriman::where('no_nota', $request->no_nota)
            ->update([
                'komisi' => $total_komisi / $total_pengirim
            ]);

        return back()->with('success', 'Pengirim ditambahkan');
    }

    public function hapusPengirim(Pengiriman $pengirim, Request $request)
    {
        $pengirim->delete();

        // Ambil Total komisi
        $detail = DetailTransaksi::where('no_nota', $request->no_nota)->get();
        $total_komisi = $detail->sum('komisi_kirim');

        //Ambil Total Pengirim
        $pengirim = Pengiriman::where('no_nota', $request->no_nota)->get();
        $total_pengirim = $pengirim->count();



        // Update Komisi
        Pengiriman::where('no_nota', $request->no_nota)
            ->update([
                'komisi' => $total_komisi / $total_pengirim
            ]);

        return back()->with('success', 'Pengirim dihapus');
    }

    public function kirim(Transaksi $transaksi)
    {
        $transaksi->update(
            [
                'status_pengiriman' => 'Dikirim'
            ]
        );

        return back()->with('success', 'Status barang diubah menjadi kirim');
    }

    public function cetakNotaKirim(Transaksi $transaksi)
    {

        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'atasNama'])->first();
        $pdf = PDF::loadView('nota.pengiriman_barang', [
            'transaksi' => $data_transaksi,
        ])->setPaper('a5', 'portrait');;
        return $pdf->stream('nota kirim' . now() . '.pdf', array("Attachment" => false));

    }
}
