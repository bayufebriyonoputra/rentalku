<?php

namespace App\Http\Controllers;

use App\Models\DetailPaket;
use App\Models\Kategori;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        return view('paket.list', [
            'paket' => Paket::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'paket' => 'required'
        ]);

        Paket::create($validatedData);
        return back()->with('success', 'Data berhasil ditambahakan');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit',[
            'paket' => $paket
        ]);
    }

    public function update(Paket $paket, Request $request){
        $paket->update([
            'paket' => $request->input('paket')
        ]);

        return redirect()->to('/paket')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Paket $paket){
        $paket->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function detailPaket(Paket $paket)
    {
        return view('paket.detail_paket', [
            'paket' => $paket,
            'detail_paket' => DetailPaket::where('paket_id', $paket->id)->with('tipe')->get(),
            'kategori' => Kategori::all(),

        ]);
    }

    public function storeDetailPaket(Request $request)
    {
        $data = [
            'paket_id' => $request->input('paket_id'),
            'tipe_id' => $request->input('tipe_id'),
            'unit' => $request->input('unit'),
            'lama_sewa' => $request->input('lama_sewa'),
            'total_tarif_sewa' => $request->input('total_tarif_sewa'),
            'x_kirim' => $request->input('xKomisi'),
            'total_komisi_kirim' => $request->input('total_komisi_kirim'),

        ];

        DetailPaket::create($data);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function destroyDetail(DetailPaket $detail_paket)
    {
        $detail_paket->delete();
        return back()->with('success', 'Data dihapus');
    }
}
