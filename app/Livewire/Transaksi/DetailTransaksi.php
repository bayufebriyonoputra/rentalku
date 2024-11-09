<?php

namespace App\Livewire\Transaksi;

use App\Models\Paket;
use Livewire\Component;
use App\Models\DetailTransaksi as modelDetailTransaksi;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Tipe;
use App\Models\Transaksi;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.detail_transaksi')]
class DetailTransaksi extends Component
{
    public Transaksi $transaksi;
    public $kategoriId = 'none';
    public $merkId = 'none';
    public $tipeProdukId = 'none';
    public $merk_produk;
    public $tipe_produk;
    public $kategori;

    public $satuan = '';
    public $tarif_sewa = 0;
    public $komisi_kirim =0;
    public $komisi_ambil = 0;

    public $total_tarif_sewa = 0;
    public $unit = 0;
    public $lama_sewa = 0;

    public $x_komisi = 0;
    public $total_komisi_kirim = 0;
    public $total_komisi_ambil = 0;

    public $barcode = '';


    public function mount(){
        $this->lama_sewa = $this->getDiffTanggal($this->transaksi->tanggal_kirim, $this->transaksi->tanggal_ambil);
    }

    public function render()
    {
        $detail_transaksi = modelDetailTransaksi::where('no_nota', $this->transaksi->no_nota)->with('tipe')->get();
        $this->merk_produk = Merk::where('kategori_id', $this->kategoriId)->get();
        $this->kategori = Kategori::all();
        $this->tipe_produk = Tipe::where('merk_id', $this->merkId)->get();

        if ($this->tipeProdukId !=  'none') {
            $this->satuan = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->satuan;
            $this->tarif_sewa = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->tarif_sewa;
            $this->komisi_kirim = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->komisi_kirim;
            $this->komisi_ambil = $this->tipe_produk->where('id', $this->tipeProdukId)->first()->komisi_ambil;
        }

        $this->calculateTotal();
        $this->calculateKomisi();
        return view('livewire.transaksi.detail-transaksi', [
            'transaksi' => $this->transaksi,
            'detail_transaksi' => $detail_transaksi,
            'paket' => Paket::all(),

        ]);
    }

    public function store(){
        $data = [
            'no_nota' => $this->transaksi->no_nota,
            'tipe_id' => $this->tipeProdukId,
            'tarif_sewa' => $this->total_tarif_sewa,
            'lama_sewa' => $this->lama_sewa,
            'komisi_kirim' => $this->total_komisi_kirim,
            'komisi_ambil' => $this->total_komisi_ambil,
            'x_komisi' => $this->unit,
            'unit_out' => $this->unit,
        ];

        modelDetailTransaksi::create($data);
        $this->dispatch('update-harga');
        $detail_transaksi = modelDetailTransaksi::where('no_nota', $this->transaksi->no_nota)->with('tipe')->get();
        $this->dispatch('update-detail', $detail_transaksi);

    }




    public function cariBarcode(){
        $tipe = Tipe::where('barcode', $this->barcode)->with('merk.kategori')->first();

        if($tipe){
            $this->kategoriId = $tipe->merk->kategori->id;
            $this->merkId = $tipe->merk_id;
            $this->tipeProdukId = $tipe->id;
        }

    }

    private function calculateTotal()
    {
        try {

            $this->total_tarif_sewa =  (int)$this->tarif_sewa * (int)$this->unit * (int)$this->lama_sewa;
        } catch (Exception $e) {
            $this->total_tarif_sewa = 0;
        }
    }

    private function calculateKomisi()
    {
        try{
            $this->total_komisi_kirim = (int)$this->komisi_kirim * (int)$this->unit;
            $this->total_komisi_ambil = (int)$this->komisi_ambil * (int)$this->unit;
        }catch(Exception $e){
            $this->total_komisi_kirim = 0;
            $this->total_komisi_ambil = 0;
        }
    }

    private function getDiffTanggal($ambil, $kirim): int{
        $tanggal1 = Carbon::createFromFormat('Y-m-d', $ambil);
        $tanggal2 = Carbon::createFromFormat('Y-m-d', $kirim);

        $selisih =$tanggal1->diffInDays($tanggal2);
        return $selisih;
    }
}
