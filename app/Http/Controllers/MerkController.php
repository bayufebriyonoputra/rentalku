<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all()->sortBy('merk');
        $merk = Merk::with('kategori')->get();

        return view('merk.list', [
            'kategori' => $kategori,
            'merk' => $merk
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
            'kategori_id' => ['required'],
            'merk' => ['required', 'unique:merk,merk']
        ]);

        Merk::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merk $merk)
    {
        $kategori = Kategori::all();
        return view('merk.edit', [
            'merk' => $merk,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merk $merk)
    {
        $validatedData = $request->validate([
            'kategori_id' => ['required'],
            'merk' => ['required',
                Rule::unique('merk', 'merk')->where(function ($q) use ($merk){
                    return $q->where('merk', '!=' , $merk->merk);
                })
            ]
        ]);

        $merk->update($validatedData);
        return redirect()->to('/merk')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
