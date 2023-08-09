<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.list', [
            'kategori' => $kategori
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
            'kategori' => ['required', 'unique:kategoris,kategori'],
            'deskripsi' => ['required']
        ]);

        Kategori::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'kategori' => ['required',
            Rule::unique('kategoris', 'kategori')->where(function($q) use ($kategori){
                return $q->where('kategori', '!=', $kategori->kategori);
            })
        ],
            'deskripsi' => ['required']
        ]);

        $kategori->update($validatedData);
        return redirect()->to('/kategori')->with('success', 'Data berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
