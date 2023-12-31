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
    <h1 class="mb-4">Detail Paket : {{ $paket->paket }}</h1>

    <p class="text-muted">Input Detail Paket</p>
    <form wire:submit="store">
        <div class="row">
            <div class="col-md-6">
                <p class="mt-4 text-muted"><b>Data Detail Paket</b></p>
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
                        <select wire:model.change='merkId' name="merk_id" id="MerkId" class="form-select" required>
                            <option value="none" disabled selected>---Pilih Merk---</option>
                            @foreach ($merk as $m)
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
                        <select wire:model.change="tipeId" name="tipe_id" id="TipeId" class="form-select" required>
                            <option value="none" disabled selected>---Pilih Tipe---</option>
                            @foreach ($tipe as $t)
                                <option wire:key="{{ $t->id }}" value="{{ $t->id }}">{{ $t->tipe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Barcode" class="">Code Tipe</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" wire:model="barcode">
                    </div>
                    <div class="col-md-2">
                        <button wire:click="searchBarcode" type="button" class="btn btn-primary">Cari</button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Unit</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="unit" type="number" class="form-control" name="unit" id="Unit" placeholder="1"
                            required>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mt-4">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Lama Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="lamaSewa" type="number" class="form-control" name="lama_sewa" id="LamaSewa"
                            placeholder="1 (hari)" required>
                        {{-- <p class="text-muted" id="LbTotalSewa">Total Tarif Sewa : </p> --}}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label for="" class="">Tarif Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="tarifSewa" type="text" class="form-control" name="tarif_sewa" id="TarifSewa" readonly required>
                        <p class="fw-bold mt-3">Total Tarif Sewa : {{ formatRupiah($totalTarifSewa) }} </p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Komisi Kirim</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="komisiKirim" type="text" class="form-control" name="komisi_kirim" id="KomisiKirim" readonly
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">X Komisi</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="xKomisi" type="number" class="form-control" name="xKomisi" id="XKomisi" placeholder="1"
                            required>
                        <p class="text-muted fw-bold mt-3" id="LbTotalKomisi">Total Komisi : {{ formatRupiah($totalKomisiKirim) }} </p>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




    <div style="overflow-x: auto; margin-top: 80px">
        <table class="table table-striped mt-4 display nowrap" id="myTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Lama Sewa</th>
                    <th scope="col">Tarif Sewa</th>
                    <th scope="col">Total Tarif Sewa</th>
                    <th scope="col">X Kirim</th>
                    <th scope="col">Total Komisi Kirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_paket as $dt)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dt->tipe->tipe }}</td>
                        <td>{{ $dt->unit }}</td>
                        <td>{{ $dt->lama_sewa }}</td>
                        <td>{{ $dt->tipe->tarif_sewa }}</td>
                        <td>{{ $dt->total_tarif_sewa }}</td>
                        <td>{{ $dt->x_kirim }}</td>
                        <td>{{ $dt->total_komisi_kirim }}</td>
                        <td>
                            <form action="/paket/detail/{{ $dt->id }}" class="d-inline"
                                id="myForm{{ $loop->iteration }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteData('myForm{{ $loop->iteration }}')"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
                scrollX: true
            });
        });
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
