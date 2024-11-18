<?php

namespace App\Livewire\Transaksi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\AtasNama;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\PenyewaUmum;

class TransaksiController extends Component
{
    public $isPelanggan = true;
    public $isPenyewaUmum = false;
    public $tanggal = null;
    public $tanggal_kirim = null;
    public $tanggal_ambil = null;
    public $no_nota = null;

    public $pelangganId = null;

    public $nama = null;
    public $alamat = null;
    public $no_telpon = null;
    public $kota = null;

    public $nama_umum = null;
    public $alamat_umum = null;
    public $no_telpon_umum = null;
    public $kota_umum = null;



    public function mount(){
        $this->tanggal = Carbon::now()->format('Y-m-d');
        $this->tanggal_kirim = Carbon::now()->format('Y-m-d');
        $this->tanggal_ambil = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $nota= $this->isPelanggan == true ? 'SP' : 'SU';
        $this->no_nota = $nota . now()->isoFormat('YYMM') . $this->getDataByCurrentMonth();
        $transaksi = Transaksi::with(['pelanggan', 'atasNama'])->latest()->get();
        // dd($transaksi->toArray());

        return view('livewire.transaksi.transaksi-controller', [
            'pelanggan' => Pelanggan::all(),
            'transaksi' => Transaksi::with('pelanggan')->latest()->get()
        ]);
    }

    public function store()
    {

        $data = [
            'tanggal' => $this->tanggal,
            'tanggal_kirim' => $this->tanggal_kirim,
            'tanggal_ambil' => $this->tanggal_ambil,
            'no_nota' => $this->no_nota,
        ];
        if (!$this->nama_umum) {
            $data['pelanggan_id'] =  $this->pelangganId;
        }

        Transaksi::create($data);
        if ($this->nama_umum) {
            PenyewaUmum::create([
                'no_nota' => $this->no_nota,
                'nama' => $this->nama_umum,
                'alamat' => $this->alamat_umum,
                'no_telpon' => $this->no_telpon_umum,
                'kota' => $this->kota_umum
            ]);
        }

        AtasNama::create([
            'no_nota' => $this->no_nota,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'no_telpon' => $this->no_telpon,
            'kota' => $this->kota
        ]);

        session()->flash('success', 'Order Berhasil Dibuat');
        $this->resetFields();

    }

    public function setIsPelanggan()
    {
        $this->isPelanggan = true;
        $this->isPenyewaUmum = false;
    }

    public function setIsPenyewaUmum()
    {
        $this->isPenyewaUmum = true;
        $this->isPelanggan = false;
    }

    private function resetFields()
    {
        $this->tanggal = null;
        $this->tanggal_kirim = null;
        $this->tanggal_ambil = null;
        $this->no_nota = null;

        $this->pelangganId = null;

        $this->nama = null;
        $this->alamat = null;
        $this->no_telpon = null;
        $this->kota = null;

        $this->nama_umum = null;
        $this->alamat_umum = null;
        $this->no_telpon_umum = null;
        $this->kota_umum = null;
    }



    private function getDataByCurrentMonth()
    {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        if($this->isPelanggan){
            $data = Transaksi::whereMonth('created_at', $currentMonth)
                ->whereNotNull('pelanggan_id')
                ->whereYear('created_at', $currentYear)
                ->latest()
                ->first();
        }else{
            $data = Transaksi::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->whereNull('pelanggan_id')
                ->latest()
                ->first();
        }

        $lastThreeDigits = substr($data->no_nota ?? 0, -3);

        // Ubah string menjadi angka, tambahkan 1, lalu konversi kembali ke string
        $lastThreeDigitsNumber = intval($lastThreeDigits) + 1;
        $result = str_pad($lastThreeDigitsNumber, 3, '0', STR_PAD_LEFT);

        return $result;
    }
}
