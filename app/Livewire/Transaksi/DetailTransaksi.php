<?php

namespace App\Livewire\Transaksi;

use App\Models\Paket;
use Livewire\Component;
use App\Models\DetailTransaksi as modelDetailTransaksi;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Tipe;
use App\Models\Transaksi;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.detail_transaksi')]
class DetailTransaksi extends Component
{
    public Transaksi $transaksi;
    public $kategoriId= 'none';
    public $merkId = 'none';
    public $tipeProdukId = 'none';
    public $merk_produk = [];
    public $tipe_produk = [];
    public $kategori = [];

    public $satuan = '';
    public $tarif_sewa = '';
    public $komisi_kirim = '';


    public function render()
    {
        $detail_transaksi = modelDetailTransaksi::where('no_nota', $this->transaksi->no_nota)->with('tipe')->get();
        $this->merk_produk = Merk::where('kategori_id', $this->kategoriId)->get();
        $this->kategori = Kategori::all();
        $this->tipe_produk = Tipe::where('merk_id', $this->merkId)->get();

        if($this->tipeProdukId !=  'none'){
            $this->satuan = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->satuan;
            $this->tarif_sewa = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->tarif_sewa;
            $this->komisi_kirim = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->komisi_kirim;
        }
        return view('livewire.transaksi.detail-transaksi', [
            'transaksi' => $this->transaksi,
            'detail_transaksi' => $detail_transaksi,
            'total_biaya_sewa' => $detail_transaksi->sum('tarif_sewa'),
            'total_komisi_kirim' => $detail_transaksi->sum('komisi_kirim'),
            'paket' => Paket::all(),

        ]);
    }
}
