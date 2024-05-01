<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $merk = Merk::all();
        $tipe = Tipe::with('merk.kategori')->get();
        return view('tipe.list', [
            'kategori' => $kategori,
            'merk' => $merk,
            'tipe' => $tipe
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
            'merk_id' => 'required',
            'tipe' => ['required', 'unique:tipe,tipe'],
            'tarif_sewa' => 'required',
            'komisi_kirim' => 'required',
            'komisi_ambil' => 'required',
            'satuan' => 'required',
            'saldo_awal' => 'required',
            'stock' => 'required',
        ]);

        Tipe::create($validatedData);
        return back()->with('success', 'Date Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipe $tipe)
    {
        $kategori = Kategori::all();
        return view('tipe.edit', [
            'tipe' => $tipe,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipe $tipe)
    {
        $validatedData = $request->validate([
            'merk_id' => 'required',
            'tipe' => [
                'required',
                Rule::unique('tipe', 'tipe')->where(function ($q) use ($tipe) {
                    return $q->where('tipe', '!=', $tipe->tipe);
                })
            ],
            'tarif_sewa' => 'required',
            'komisi_kirim' => 'required',
            'komisi_ambil' => 'required',
            'satuan' => 'required',
            'saldo_awal' => 'required',
            'stock' => 'required',
            'barcode' => 'min:1'
        ]);

        $tipe->update($validatedData);
        return redirect()->to('/tipe')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipe $tipe)
    {
        $tipe->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
