<div>
    <form  class="mt-5" wire:submit="store">
        <div class="row">
            <div class="col-md-4">
                <p><b>Total Biaya Sewa : {{ formatRupiah($total_biaya_sewa) }}</b></p>
                <p><b>Total Komisi Kirm : {{ formatRupiah($total_komisi_kirim) }}</b></p>
                <p><b id="Jumlah">Jumlah :
                        {{ formatRupiah($total_komisi_kirim + $total_biaya_sewa + $transaksi->biaya_kirim_ambil) }}</b>
                </p>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Uang Muka</label>
                    </div>
                    <div class="col-md-9">
                        <input wire:model.live="uang_muka" type="number" placeholder="Rp." class="form-control" name="uang_muka" id="UangMuka"
                            value="{{ $transaksi->uang_muka }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Biaya Kirim/Ambil</label>
                    </div>
                    <div class="col-md-9">
                        <input wire:model.live="biaya_kirim_ambil" type="number" placeholder="Rp." class="form-control" name="biaya_kirim_ambil"
                            id="BiayaKirimAmbil" value="{{ $transaksi->biaya_kirim_ambil }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Diskon</label>
                    </div>
                    <div class="col-md-9">
                        <input wire:model.live="diskon" type="number" placeholder="%" class="form-control" name="diskon" id="Diskon"
                            required>
                    </div>
                </div>
                <p class="mt-3"><b id="Sisa">Sisa : {{ formatRupiah($sisa) }}</b></p>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/nota/penyewaan/{{ $transaksi->id }}" target="_blank" class="btn btn-success">Cetak Nota
                    Penyewaan</a>
            </div>
        </div>
    </form>
</div>
