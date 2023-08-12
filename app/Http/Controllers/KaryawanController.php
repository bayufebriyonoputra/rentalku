<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.list', [
            'karyawan' => $karyawan
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
        $validatedData = $request->validate([
            'nama' => ['required', 'unique:karyawans,nama'],
            'jenis_kelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telpon' => 'required',
            'no_hp' => 'required',
            'posisi' => 'required',
            'status' => 'required',
            'uang_makan' => 'required',
            'uang_harian' => 'required',
            'uang_lembur' => 'required'
        ]);
        $validatedData['ttl'] = $request->input('ttl') . ' ' . Carbon::parse($request->input('ttl_date'))->locale('id_ID')->isoFormat('D MMMM Y');
        Karyawan::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nama' => [
                'required',
                Rule::unique('karyawans', 'nama')->where(function ($q) use ($karyawan) {
                    return $q->where('nama', '!=', $karyawan->nama);
                })
            ],
            'jenis_kelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telpon' => 'required',
            'no_hp' => 'required',
            'posisi' => 'required',
            'status' => 'required',
            'uang_makan' => 'required',
            'uang_harian' => 'required',
            'uang_lembur' => 'required'
        ]);
        $validatedData['ttl'] = $request->input('ttl') . ' ' . Carbon::parse($request->input('ttl_date'))->locale('id_ID')->isoFormat('D MMMM Y');
        $karyawan->update($validatedData);
        return redirect()->to('/karyawan')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
