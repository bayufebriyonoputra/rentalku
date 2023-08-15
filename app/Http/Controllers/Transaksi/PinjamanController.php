<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    public function index()
    {
        return view('transaksi.pinjaman.list', [
            'karyawan' => Karyawan::all(),
            'pinjaman' => Pinjaman::with('karyawan')->get()
        ]);
    }

    public function store(Request $request)
    {
        $saldo = Pinjaman::where('karyawan_id', $request->input('karyawan_id'))->latest()->first();
        $data = [
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal' => $request->input('tanggal'),
            'keterangan' => $request->input('keterangan'),
            'no_bukti' => 'KAR' . now()->format('dmyHis')
        ];


        if ($request->input('transaksi') === 'pinjaman') {
            $data['pinjaman'] = $request->input('nominal');
            $data['saldo'] = ($saldo->saldo ?? 0) + $request->input('nominal');
            $data['kode_transaksi'] = 'PJ' . now()->format('dmyHis');
        } else {
            $data['pengembalian'] = $request->input('nominal');
            $data['saldo'] = ($saldo->saldo ?? 0) - $request->input('nominal');
            $data['kode_transaksi'] = 'KB' . now()->format('dmyHis');
        }

        Pinjaman::create($data);
        return back()->with('success', 'Pinjaman ditambahkan');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
