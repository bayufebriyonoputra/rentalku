<?php

namespace App\Livewire\Transaksi;

use App\Models\DetailTransaksi;
use App\Models\Tipe;
use Livewire\Component;

class TableDetailTransaksi extends Component
{

    public $detail_transaksi;
    public $detailTransaksiId = null;
    public $unit;
    public $lamaSewa;
    public $noNota;


    public function mount($detail_transaksi)
    {
        $this->detail_transaksi = $detail_transaksi;
        
        if($this->detail_transaksi->count()){
            $this->noNota = $detail_transaksi->first()->no_nota;
        }else{
            $this->noNota = "";
        }
    }

    public function render()
    {
        $this->detail_transaksi = DetailTransaksi::where('no_nota', $this->noNota)->get();
        return view('livewire.transaksi.table-detail-transaksi');
    }

    public function selectDetail($id)
    {
        $this->detailTransaksiId = $id;
        $detail = DetailTransaksi::where('id', $this->detailTransaksiId)->first();
        $this->unit = $detail->unit_out;
        $this->lamaSewa = $detail->lama_sewa;
    }

    public function update()
    {
        $detailTransaksi = DetailTransaksi::where('id', $this->detailTransaksiId)->first();
        $totalSewa =(int)$this->unit * (int)$this->lamaSewa * (int)$detailTransaksi->tipe->tarif_sewa;

        $detailTransaksi->update([
            'unit_out' => $this->unit,
            'lama_sewa' => $this->lamaSewa,
            'tarif_sewa' => $totalSewa
        ]);

        $this->detailTransaksiId = null;
        $this->dispatch('update-harga');
    }
}
