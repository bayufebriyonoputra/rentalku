<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi.absen.list',[
            'absen' => Absensi::all(),
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal' => $request->input('tanggal'),
            'shift' => $request->input('shift'),
            'uang_makan' => $request->input('uang_makan'),
            'uang_lembur' => $request->input('total_uang_lembur'),
            'uang_harian' => $request->input('uang_harian'),
        ];

        Absensi::create($data);
        return back()->with('success', 'Absen Terecord');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
