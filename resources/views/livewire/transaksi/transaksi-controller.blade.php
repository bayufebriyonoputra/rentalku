<div>
    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil',
                'Order Ditambahkan',
                'success'
            )
        </script>
    @endif
    <h1 class="mb-4">Transaksi Penyewaan Barang</h1>

    <p class="text-muted">Input Transaksi</p>
    <form wire:submit="store">

        <div class="row">
            <div class="col-md-6">
                <p class="mt-4 text-muted"><b>Data Transaksi</b></p>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Pesan</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="tanggal" type="date" class="col-md-9 form-control" name="tanggal"
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Kirim</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="tanggal_kirim" type="date" class="col-md-9 form-control"
                            name="tanggal_kirim" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Ambil</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model = "tanggal_ambil" type="date" class="col-md-9 form-control"
                            name="tanggal_ambil" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">No Nota</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="no_nota" type="text" class="col-md-9 form-control" name="no_nota" readonly
                            required>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mt-4">
                {{-- Radio Button --}}
                <p>Pilih Jenis Pelanggan</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check" wire:click="setIsPelanggan">
                            <input class="form-check-input" type="radio" name="PenyewaType" id="Pelanggan"
                                value="Pelanggan" checked>
                            <label class="form-check-label" for="Pelanggan">
                                Pelanggan
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check" wire:click="setIsPenyewaUmum">
                            <input class="form-check-input" type="radio" name="PenyewaType" id="PenyewaUmum"
                                value="PenyewaUmum">
                            <label class="form-check-label" for="PenyewaUmum">
                                Penyewa Umum
                            </label>
                        </div>
                    </div>
                </div>


                {{-- Pelanggan --}}
                @if ($isPelanggan)
                    <div wire:transition class="pelanggan" id="PelangganForm">
                        <p class="text-muted"><b>Data Pelanggan</b></p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="">Pilih Pelanggan</label>
                            </div>
                            <div class="col-md-8">
                                <select wire:model="pelangganId" name="pelanggan_id" id="PilihPelanggan"
                                    class="form-select" required>
                                    <option value="-" selected>---Pilih Data---</option>
                                    @foreach ($pelanggan as $p)
                                        <option wire:key="{{ $p->id }}" value="{{ $p->id }}">
                                            {{ $p->pelanggan }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                @endif

                {{-- Penyewa Umum --}}
                @if (!$isPelanggan)
                    <div wire:transition class="penyewa-umum" id="PenyewaUmumForm">
                        <p class="text-muted"><b>Penyewa Umum</b></p>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="" class="">Nama</label>
                            </div>
                            <div class="col-md-8">
                                <input wire:model="nama_umum" type="text" id="NamaUmum"
                                    class="col-md-9 form-control" name="nama_umum" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="" class="">Alamat</label>
                            </div>
                            <div class="col-md-8">
                                <textarea wire:model ="alamat_umum" name="alamat_umum" id="AlamatUmum" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="" class="">No Telepon</label>
                            </div>
                            <div class="col-md-8">
                                <input wire:model="no_telpon_umum" type="number" class="col-md-9 form-control"
                                    name="no_telpon_umum" id="NoTelponUmum" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="" class="">Kota</label>
                            </div>
                            <div class="col-md-8">
                                <input wire:model="kota_umum" type="text" class="col-md-9 form-control"
                                    name="kota_umum" id="KotaUmum" required>
                            </div>
                        </div>

                    </div>
                @endif

                <p class="text-muted"><b>Atas Nama</b></p>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Nama</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="nama" type="text" class="col-md-9 form-control" name="nama"
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Alamat</label>
                    </div>
                    <div class="col-md-8">
                        <textarea wire:model="alamat" name="alamat" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">No Telepon</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="no_telpon" type="number" class="col-md-9 form-control" name="no_telpon"
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Kota</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model="kota" type="text" class="col-md-9 form-control" name="kota"
                            required>
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
                    <th scope="col">No Nota</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Tanggal Kirim</th>
                    <th scope="col">Tanggal Ambil</th>
                    {{-- <th scope="col">Total Sewa</th> --}}
                    {{-- <th scope="col">Biaya Kirim Ambil</th> --}}
                    {{-- <th scope="col">Uang Muka</th> --}}
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Alamat Pelanggan</th>
                    <th scope="col">Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $t->no_nota }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tannggal)->locale('id')->isoFormat(' D-MM-YYYY', 'dddd') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_kirim)->locale('id')->isoFormat(' D-MM-YYYY', 'dddd') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_ambil)->locale('id')->isoFormat(' D-MM-YYYY', 'dddd') }}
                        </td>
                        {{-- <td>{{ formatRupiah($t->total_sewa) }}</td> --}}
                        {{-- <td>{{ formatRupiah($t->biaya_kirim_ambil) }}</td> --}}
                        {{-- <td>{{ formatRupiah($t->uang_muka) }}</td> --}}
                        <td>{{ $t->atasNama->nama ?? '-' }}</td>
                        <td>{{ $t->atasNama->alamat ?? '-' }}</td>
                        <td>{{ $t->atasNama->no_telpon ?? '-'}}</td>
                        <td><a href="/transaksi-sewa/{{ $t->id }}/edit" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                            <span wire:click='setUpdate({{ $t->id }})' role="button" class="btn btn-warning"> <i class="fa-solid fa-pen-to-square"></i></span>
                            <form action="/transaksi-sewa/hapus/{{ $t->id }}" class="d-inline"
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
