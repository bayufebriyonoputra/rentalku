<div>

    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
    <h1 class="mb-4">Detail No Nota : {{ $transaksi->no_nota }}</h1>

    <p class="text-muted">Input Transaksi</p>
    <form wire:submit="store">
        <div class="row">
            <div class="col-md-6">
                <p class="mt-4 text-muted"><b>Data Transaksi</b></p>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Barcode" class="">Kode Tipe</label>
                    </div>
                    <div class="col-md-7">
                        <input wire:change="cariBarcode" wire:model="barcode" type="text" class="form-control" placeholder="Cari berdasarkan code">
                    </div>
                    <div class="col-md-2">
                        <button wire:click="cariBarcode" type="button" class="btn btn-primary">cari</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="KategoriId" class="">Kategori Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select wire:model.change="kategoriId" name="kategori_id" id="KategoriId" class="form-select"
                            required>
                            <option value="none" disabled selected>---Pilih Kategori---</option>
                            @foreach ($kategori as $k)
                                <option wire:key="{{ $k->id }}" value="{{ $k->id }}">{{ $k->kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="MerkId" class="">Merk Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select wire:model.change="merkId" name="merk_id" id="MerkId" class="form-select" required>
                            <option value="none" disabled selected>---Pilih Merk---</option>
                            @foreach ($merk_produk as $m)
                                <option wire:key="{{ $m->id }}" value="{{ $m->id }}">{{ $m->merk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="TipeId" class="">Tipe Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select wire:model.change="tipeProdukId" name="tipe_id" id="TipeId" class="form-select"
                            required>
                            <option value="none" disabled selected>---Pilih Merk---</option>
                            @foreach ($tipe_produk as $t)
                                <option wire:key="{{ $t->id }}" value="{{ $t->id }}">{{ $t->tipe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Barcode" class="">Kode Tipe</label>
                    </div>
                    <div class="col-md-7">
                        <input wire:model="barcode" type="text" class="form-control" placeholder="Cari berdasarkan code">
                    </div>
                    <div class="col-md-2">
                        <button wire:click="cariBarcode" type="button" class="btn btn-primary">cari</button>
                    </div>
                </div> --}}

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Unit</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="unit" type="number" class="form-control" name="unit" id="Unit"
                            placeholder="1" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Satuan</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="satuan" type="text" class="form-control" name="satuan"
                            id="Satuan" readonly required>
                        <button type="button"wire:click="store"  class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mt-4">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="" class="">Tarif Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="tarif_sewa" type="text" class="form-control" name="tarif_sewa"
                            id="TarifSewa" readonly required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Lama Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="lama_sewa" type="number" class="form-control" name="lama_sewa"
                            id="LamaSewa" placeholder="1 (hari)" required>
                        <p class="text-muted" id="LbTotalSewa">Total Tarif Sewa :{{ formatRupiah($total_tarif_sewa) }}
                        </p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Komisi Kirim</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="komisi_kirim" type="text" class="form-control"
                            name="komisi_kirim" id="KomisiKirim" readonly required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">X Komisi</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="x_komisi" type="number" class="form-control" name="xKomisi"
                            id="XKomisi" placeholder="1" required>
                        <p class="text-muted" id="LbTotalKomisi">Total Komisi :
                            {{ formatRupiah($total_komisi_kirim) }} </p>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <p>Pilih Paket</p>
    <form action="/transaksi-sewa/detailOrder/paket" method="POST">
        @csrf
        <input type="hidden" name="no_nota" value="{{ $transaksi->no_nota }}">
        <div class="row">
            <div class="col-md-6">
                <select name="paket_id" id="Paket" class="form-select">
                    @foreach ($paket as $p)
                        <option value="{{ $p->id }}">{{ $p->paket }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>




   <livewire:transaksi.table-detail-transaksi :detail_transaksi="$detail_transaksi" />



  <livewire:transaksi.detail-transaksi-pay :transaksi="$transaksi"/>


</div>

@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.min.css') }}">
@endsection

@section('bottom')
    <script src="{{ asset('datatables/jQuery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/DataTables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('#myTable').DataTable({
        //         scrollX: true
        //     });
        // });
    </script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#exampleModal").modal('show');
            });
        </script>
    @endif

    <script>
        function deleteData(formid) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById(formid);
                    form.submit();
                }
            })
        }
    </script>

    <script>
        function formatToRupiah(angka) {
            // Format angka ke mata uang Rupiah (IDR)
            return angka.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            });
        }

    </script>
@endsection
