<div>

    <div style="overflow-x: auto; margin-top: 80px">
        <table class="table table-striped mt-4 display nowrap" id="myTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tipe/Jeis Produk</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Tarif Sewa</th>
                    <th scope="col">Lama Sewa</th>
                    <th scope="col">Total Tarif Sewa</th>
                    <th scope="col">Komisi Kirim</th>
                    <th scope="col">Total Komisi Kirim</th>
                    <th scope="col">X Kirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div>

                    @foreach ($detail_transaksi as $dt)
                        <tr wire:key="{{ $dt->id }}">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dt->tipe->tipe }}</td>
                            <td>{{ $dt->unit_out }}</td>
                            <td>{{ $dt->tipe->satuan }}</td>
                            <td>{{ formatRupiah($dt->tipe->tarif_sewa) }}</td>
                            <td>{{ $dt->lama_sewa }}</td>
                            <td>{{ formatRupiah($dt->tarif_sewa) }}</td>
                            <td>{{ formatRupiah($dt->tipe->komisi_kirim) }}</td>
                            <td>{{ $dt->x_komisi }}</td>
                            <td>{{ formatRupiah($dt->komisi_kirim) }}</td>
                            <td>
                                <span role="button" type="button" class="btn btn-warning d-inline"
                                    wire:click="selectDetail('{{ $dt->id }}')"><i
                                        class="fa-solid fa-pen-to-square"></i></span>

                                <form action="/transaksi-sewa/detailOrder/{{ $dt->id }}" class="d-inline"
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
                </div>


            </tbody>
        </table>
        @if ($detailTransaksiId)
            <div wire:transition class="card">
                <div class="card-header">
                    Edit Unit dan Lama Sewa
                </div>
                <div class="card-body">
                    <form wire:submit="update">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Unit">Unit</label>
                                <input wire:model="unit" type="number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="lamaSewa">Lama Sewa</label>
                                <input wire:model="lamaSewa" type="number" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary col-md-1 mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>
</div>
