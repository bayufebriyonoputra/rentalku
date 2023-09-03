<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaksi;
use App\Models\Pengambilan;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;

class PengambilanController extends Controller
{
    public function index()
    {
        return view('transaksi.pengambilan.cari_nota');
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
        // $total_komisi = $detail->sum('tipe.komisi_ambil');
        $total_komisi = 0;
        foreach ($detail as $d) {
            $total_komisi += $d->x_komisi * $d->tipe->komisi_ambil;
        }



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


        if ($pengambilan->count()) {

            // Update Komisi
            Pengambilan::where('no_nota', $request->no_nota)
                ->update([
                    'komisi' => $total_komisi / $total_pengambilan
                ]);
        }

        return back()->with('success', 'Pengirim dihapus');
    }
    public function ambil(Transaksi $transaksi)
    {
        $transaksi->update(
            [
                'status_pengambilan' => 'Diambil',
            ]
        );
        $detail_transaksi = DetailTransaksi::where('no_nota' , $transaksi->no_nota)->get();
        foreach($detail_transaksi as $dt){
            DetailTransaksi::where('id', $dt->id)
                ->update([
                    'unit_in' => $dt->unit_out
                ]);
        }

        return back()->with('success', 'Status barang diubah menjadi Diambil');
    }

    public function cetakNotaAmbil(Transaksi $transaksi)
    {

        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'atasNama'])->first();
        $pdf = PDF::loadView('nota.pengambilan_barang', [
            'transaksi' => $data_transaksi,
        ])->setPaper('a5', 'portrait');;
        return $pdf->stream('nota ambil' . now() . '.pdf', array("Attachment" => false));
    }

    public function cetakNotaLunas(Transaksi $transaksi)
    {
        // $total_bayar = $transaksi->total_sewa + $transaksi->biaya_kirim_ambil + $transaksi->total_komisi;

        $sisa_bayar = $transaksi->jumlah_bayar - $transaksi->uang_muka;

        $transaksi->pelunasan = $sisa_bayar;
        $transaksi->save();



        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'atasNama'])->first();
        $detail_transaksi = DetailTransaksi::where('no_nota', $transaksi->no_nota)->get();
        $pdf = PDF::loadView('nota.pelunasan', [
            'transaksi' => $data_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim')
        ])->setPaper('a5', 'portrait');;
        return $pdf->stream('nota pelunasan' . now() . '.pdf', array("Attachment" => false));
    }

    public function cetakNotaKomisiAmbil(Transaksi $transaksi)
    {
        $detail = DetailTransaksi::where('no_nota', $transaksi->no_nota)->with('tipe')->get();
        $total_komisi = 0;
        foreach ($detail as $d) {
            $total_komisi += $d->x_komisi * $d->tipe->komisi_ambil;
        }
        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'pengambilan'])->first();
        $pdf = PDF::loadView('nota.komisi_pengambilan', [
            'transaksi' => $data_transaksi,
            'total_komisi_ambil' => $total_komisi
        ])->setPaper('a5', 'portrait');;
        return $pdf->stream('nota komsi ambil' . now() . '.pdf', ["Attachment" => 0]);
    }
}
