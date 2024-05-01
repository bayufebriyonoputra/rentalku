<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use App\Models\DetailTransaksi;


class DetailTransaksiPay extends Component
{
    public $transaksi;
    public $total_biaya_sewa = 0;
    public $total_komisi_kirim = 0;
    public $total_komisi_ambil = 0;
    public $uang_muka = 0;
    public $biaya_kirim_ambil = 0;
    public $diskon = 0;
    public $sisa = 0;
    public $jumlah_total = 0;

    public function mount($transaksi)
    {
        $this->transaksi = $transaksi;
        $detail_transaksi = DetailTransaksi::where('no_nota', $this->transaksi->no_nota)->with('tipe')->get();
        $this->total_biaya_sewa = $detail_transaksi->sum('tarif_sewa');
        $this->total_komisi_kirim = $detail_transaksi->sum('komisi_kirim');
        $this->total_komisi_ambil = $detail_transaksi->sum('komisi_ambil');
    }

    #[On('update-harga')]
    public function updateHarga()
    {
        $detail_transaksi = DetailTransaksi::where('no_nota', $this->transaksi->no_nota)->with('tipe')->get();
        $this->total_biaya_sewa = $detail_transaksi->sum('tarif_sewa');
        $this->total_komisi_kirim = $detail_transaksi->sum('komisi_kirim');
        $this->total_komisi_ambil = $detail_transaksi->sum('komisi_ambil');
    }

    public function calculatePrice()
    {
        $total = (int)$this->total_komisi_ambil + (int)$this->total_komisi_kirim + (int)$this->total_biaya_sewa + (int)$this->biaya_kirim_ambil;
        $diskon = (int)$this->diskon / 100 * $total;
        $this->jumlah_total = $total - $diskon;
        $this->sisa = (int)$this->jumlah_total - (int)$this->uang_muka;
    }

    public function render()
    {
        $this->calculatePrice();
        return view('livewire.transaksi.detail-transaksi-pay');
    }

    public function store(){
        $transaksi = Transaksi::where('no_nota', $this->transaksi->no_nota)->first();
        $data_transaksi = [
            'total_sewa' => $this->total_biaya_sewa,
            'total_komisi' => $this->total_komisi_kirim + $this->total_komisi_ambil,
            'biaya_kirim_ambil' => $this->biaya_kirim_ambil,
            'uang_muka' => $this->uang_muka,
            'diskon' => $this->diskon,
            'jumlah_bayar' => $this->jumlah_total
        ];

        $transaksi->update($data_transaksi);
    }
}
