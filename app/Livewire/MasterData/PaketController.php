<?php

namespace App\Livewire\MasterData;

use App\Models\Paket;
use Livewire\Component;
use App\Models\DetailPaket;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Tipe;
use Exception;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.detail_transaksi')]
class PaketController extends Component
{
    public Paket $paket;
    public $kategori = [];
    public $kategoriId = 'none';
    public $merk = [];
    public $merkId = 'none';
    public $tipe = [];
    public $tipeId = 'none';

    public $tarifSewa = 0;
    public $komisiKirim = 0;

    public $unit = 0;
    public $lamaSewa = 0;
    public $totalTarifSewa = 0;

    public $xKomisi = 0;
    public $totalKomisiKirim = 0;

    public $barcode = '';

    public function render()
    {
        $this->kategori = Kategori::all();
        $this->merk = Merk::where('kategori_id', $this->kategoriId)->get();
        $this->tipe = Tipe::where('merk_id', $this->merkId)->get();
        if ($this->tipeId != 'none') {
            $this->tarifSewa = $this->tipe->where('id', $this->tipeId)->first()->tarif_sewa;
            $this->komisiKirim = $this->tipe->where('id', $this->tipeId)->first()->komisi_kirim;
        }
        $this->calculateSewaPrice();
        $this->calculateKomisiPrice();
        return view('livewire.master-data.paket-controller', [
            'detail_paket' => DetailPaket::where('paket_id', $this->paket->id)->with('tipe')->get(),
        ]);
    }

    public function store()
    {
        $data = [
            'paket_id' => $this->paket->id,
            'tipe_id' => $this->tipeId,
            'unit' => $this->unit,
            'lama_sewa' => $this->lamaSewa,
            'total_tarif_sewa' => $this->totalTarifSewa,
            'x_kirim' => $this->xKomisi,
            'total_komisi_kirim' => $this->totalKomisiKirim,

        ];

        DetailPaket::create($data);
    }

    public function searchBarcode()
    {
        $tipe = Tipe::where('barcode', $this->barcode)->with('merk.kategori')->first();
        if ($tipe) {
            $this->kategoriId = $tipe->merk->kategori->id;
            $this->merkId = $tipe->merk->id;
            $this->tipeId = $tipe->id;
        }
    }


    private function calculateSewaPrice()
    {
        try {
            $this->totalTarifSewa = (int)$this->unit * (int)$this->tarifSewa * (int)$this->lamaSewa;
        } catch (Exception $e) {
            $this->totalTarifSewa = 0;
        }
    }

    private function calculateKomisiPrice()
    {
        try {
            $this->totalKomisiKirim = (int)$this->xKomisi * (int)$this->komisiKirim;
        } catch (Exception $e) {
            $this->totalKomisiKirim = 0;
        }
    }
}
