<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AtasNama;
use App\Models\DetailPaket;
use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\PenyewaUmum;
use App\Models\Tipe;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class TransaksiController extends Controller
{
    public function listTransaksiSewa()
    {

        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::with('pelanggan')->latest()->get();

        return view('transaksi.transaksi_sewa', );
    }

    public function storeSewa(Request $request)
    {
        dd("tes");
        $data = [
            'tanggal' => $request->input('tanggal'),
            'tanggal_kirim' => $request->input('tanggal_kirim'),
            'tanggal_ambil' => $request->input('tanggal_ambil'),
            'no_nota' => $request->input('no_nota'),
        ];
        if (!$request->input('nama_umum')) {
            $data['pelanggan_id'] =  $request->input('pelanggan_id');
        }


        Transaksi::create($data);
        if ($request->input('nama_umum')) {
            PenyewaUmum::create([
                'no_nota' => $request->input('no_nota'),
                'nama' => $request->input('nama_umum'),
                'alamat' => $request->input('alamat_umum'),
                'no_telpon' => $request->input('no_telpon_umum'),
                'kota' => $request->input('kota_umum')
            ]);
        }

        AtasNama::create([
            'no_nota' => $request->input('no_nota'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telpon' => $request->input('no_telpon'),
            'kota' => $request->input('kota')
        ]);

        return back()->with('success', 'Order Berhasil Dibuat');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        PenyewaUmum::where('no_nota', $transaksi->no_nota)->delete();

        return back()->with('success', 'Transaksi Dihapus');
    }

    public function detailSewa(Transaksi $transaksi)
    {
        $detail_transaksi = DetailTransaksi::where('no_nota', $transaksi->no_nota)->with('tipe')->get();
        return view('transaksi.detail_transaksi', [
            'kategori' => Kategori::all(),
            'transaksi' => $transaksi,
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim'),
            'paket' => Paket::all()
        ]);
    }

    public function hapusOrdet(DetailTransaksi $id)
    {
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
        $tipe = Tipe::where('id', $request->input('tipe_id'))
            ->first();
        // $tipe->update([
        //     'stock' => $tipe->stock - $request->unit
        // ]);
        return back()->with('success', 'Item ditambahkan');
    }
    public function isiDetailOrderPaket(Request $request)
    {
        $paket = DetailPaket::where('paket_id', $request->input('paket_id'))->get();
        foreach ($paket as $p) {
            $data = [
                'no_nota' => $request->input('no_nota'),
                'tipe_id' => $p->tipe_id,
                'tarif_sewa' => $p->total_tarif_sewa,
                'lama_sewa' => $p->lama_sewa,
                'komisi_kirim' => $p->total_komisi_kirim,
                'x_komisi' => $p->x_kirim,
                'unit_out' => $p->unit,
            ];

            DetailTransaksi::create($data);
            $tipe = Tipe::where('id', $request->input('tipe_id'))
                ->first();
            // $tipe->update([
            //     'stock' => $tipe->stock - $request->unit
            // ]);
        }

        return back()->with('success', 'Item ditambahkan');
    }

    public function updateOrder(Request $request)
    {
        $no_nota = $request->input('no_nota');
        $transaksi = Transaksi::where('no_nota', $no_nota)->first();
        $data_transaksi = [
            'total_sewa' => $request->input('total_sewa'),
            'total_komisi' => $request->input('total_komisi'),
            'biaya_kirim_ambil' => $request->input('biaya_kirim_ambil'),
            'uang_muka' => $request->input('uang_muka'),
            'diskon' => $request->input('diskon'),
            'jumlah_bayar' => $request->input('jumlah_bayar')
        ];

        $transaksi->update($data_transaksi);

        return redirect()->to('/transaksi-sewa')->with('success', 'Data berhasil diupdate');
    }

    private function getDataByCurrentMonth()
    {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        $data = Transaksi::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->latest()
            ->first();

        $lastThreeDigits = substr($data->no_nota ?? 0, -3);

        // Ubah string menjadi angka, tambahkan 1, lalu konversi kembali ke string
        $lastThreeDigitsNumber = intval($lastThreeDigits) + 1;
        $result = str_pad($lastThreeDigitsNumber, 3, '0', STR_PAD_LEFT);

        return $result;
    }

    public function cetakNotaSewa(Transaksi $transaksi)
    {

        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'atasNama'])->first();
        // return $data_transaksi;
        $detail_transaksi = DetailTransaksi::where('no_nota', $transaksi->no_nota)->get();
        $customPaper = array(0,0,200, 300);
        $pdf = PDF::loadView('nota.penyewaan_barang', [
            'transaksi' => $data_transaksi,
            'penyewa_umum' => PenyewaUmum::where('no_nota', $data_transaksi->no_nota)->first(),
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim')
        ])->setPaper('a4', 'portrait');
        return $pdf->stream('nota sewa' . now() . '.pdf', ["Attachment" => 0]);
    }

    public function cetakNotaSewa2(Transaksi $transaksi){
        $data_transaksi = Transaksi::where('id', $transaksi->id)->with(['pelanggan', 'detailTransaksi', 'atasNama'])->first();
        // return $data_transaksi;
        $detail_transaksi = DetailTransaksi::where('no_nota', $transaksi->no_nota)->get();

        return view('nota.penyewaan_barang3', [
            'transaksi' => $data_transaksi,
            'penyewa_umum' => PenyewaUmum::where('no_nota', $data_transaksi->no_nota)->first(),
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim')
        ]);
    }
}
