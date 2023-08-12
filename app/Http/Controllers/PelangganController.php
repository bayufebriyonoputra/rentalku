<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan =  Pelanggan::all();
        return view('pelanggan.list', [
            'pelanggan' => $pelanggan
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
            'pelanggan' =>  ['required', 'unique:pelanggans,pelanggan'],
            'alamat' => 'required',
            'kota' => 'required',
            'no_telpon' => 'required'
        ]);

        Pelanggan::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validatedData = $request->validate([
            'pelanggan' =>  [
                'required',
                Rule::unique('pelanggans', 'pelanggan')->where(function ($q) use ($pelanggan) {
                    return $q->where('pelanggan', '!=', $pelanggan->pelanggan);
                })
            ],
            'alamat' => 'required',
            'kota' => 'required',
            'no_telpon' => 'required'
        ]);

        $pelanggan->update($validatedData);
        return redirect()->to('/pelanggan')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
