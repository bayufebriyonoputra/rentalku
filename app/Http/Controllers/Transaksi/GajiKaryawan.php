<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Karyawan;
use App\Models\Pinjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GajiKaryawan as Gaji;

class GajiKaryawan extends Controller
{
    public function index()
    {
        return view('transaksi.gaji.list', [
            'karyawan' => Karyawan::all(),
            'gaji' => Gaji::all()
        ]);
    }

    public function getPinjaman(Request $request)
    {
        $pinjaman = Pinjaman::where('karyawan_id', $request->karyawan_id)->latest()->pluck('saldo')->first();

        return response()->json($pinjaman);
    }

    public function store(Request $request)
    {
        $data = [
            'no_bukti' => $request->input('no_bukti'),
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal' => $request->input('tanggal'),
            'tanggal_awal' => $request->input('tanggal_awal'),
            'tanggal_akhir' => $request->input('tanggal_akhir'),
            'komisi_karyawan' => $request->input('komisi_karyawan'),
            'harian' => $request->input('uang_harian'),
            'sopir' => $request->input('sopir'),
            'lembur' => $request->input('uang_lembur'),
            'uang_makan' => $request->input('uang_makan'),
            'penerimaan' => $request->input('penerimaan'),
            'potongan' => $request->input('potongan'),
            'pinjaman_karyawan' => $request->input('pinjaman_karyawan'),
            'saldo' => $request->input('saldo'),

        ];

        Gaji::create($data);
        return back()->with('success', 'Data berhasil disimpan');
    }

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function cetakSlip(Gaji $gaji)
    {
        $pdf = PDF::loadView('nota.slip_gaji', [
            'gaji' => $gaji
        ])->setPaper('a5', 'portrait');;
        return $pdf->stream('slipGaji' . now() . '.pdf', array("Attachment" => false));
    }
}
