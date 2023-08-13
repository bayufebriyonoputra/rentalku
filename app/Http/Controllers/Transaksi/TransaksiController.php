<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Symfony\Component\Console\Input\Input;

class TransaksiController extends Controller
{
    public function listTransaksiSewa()
    {

        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::with('pelanggan')->get();

        return view('transaksi.transaksi_sewa', [
            'pelanggan' => $pelanggan,
            'transaksi' => $transaksi
        ]);
    }

    public function storeSewa(Request $request)
    {
        $data = [
            'tanggal' => $request->input('tanggal'),
            'tanggal_kirim' => $request->input('tanggal_kirim'),
            'tanggal_ambil' => $request->input('tanggal_ambil'),
            'no_nota' => $request->input('no_nota'),
            'pelanggan_id' => $request->input('pelanggan_id'),
        ];

        Transaksi::create($data);
        return back()->with('success', 'Order Berhasil Dibuat');
    }

    public function detailSewa(Transaksi $transaksi)
    {
        $detail_transaksi = DetailTransaksi::where('no_nota', $transaksi->no_nota)->with('tipe')->get();
        return view('transaksi.detail_transaksi', [
            'kategori' => Kategori::all(),
            'transaksi' => $transaksi,
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim')
        ]);

    }

    public function hapusOrdet(DetailTransaksi $id){
        $id->delete();
        return back()->with('success', 'Order Dihapus');
    }

    public function isiDetailOrder(Request $request)
    {
        $data = [
            'no_nota' => $request->input('no_nota'),
            'tipe_id' => $request->input('tipe_id'),
            'tarif_sewa' => $request->input('total_tarif_sewa'),
            'lama_sewa' => $request->input('lama_sewa'),
            'komisi_kirim' => $request->input('total_komisi_kirim'),
            'x_komisi' => $request->input('xKomisi'),
            'unit_out' => $request->input('unit'),
        ];

        DetailTransaksi::create($data);
        return back()->with('success', 'Item ditambahkan');
    }

    public function updateOrder(Request $request){
        $no_nota = $request->input('no_nota');
        $transaksi = Transaksi::where('no_nota', $no_nota)->first();
        $data_transaksi = [
            'total_sewa' => $request->input('total_sewa'),
            'total_komisi' => $request->input('total_komisi'),
            'biaya_kirim_ambil' => $request->input('biaya_kirim_ambil'),
            'uang_muka' => $request->input('uang_muka'),
        ];

        $transaksi->update($data_transaksi);

        return redirect()->to('/transaksi-sewa')->with('success', 'Data berhasil diupdate');

    }
}
