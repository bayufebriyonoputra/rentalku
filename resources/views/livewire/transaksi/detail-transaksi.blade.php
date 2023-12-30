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
    <form action="/transaksi-sewa/detailOrder" method="POST">
        @csrf
        <input type="hidden" id="TotalKomisiKirim" name="total_komisi_kirim">
        <input type="hidden" id="TotalTarifSewa" name="total_tarif_sewa">
        <input type="hidden" id="NoNota" name="no_nota" value="{{ $transaksi->no_nota }}">
        <div class="row">
            <div class="col-md-6">
                <p class="mt-4 text-muted"><b>Data Transaksi</b></p>
                <div class="row">
                    <div class="col-md-3">
                        <label for="KategoriId" class="">Kategori Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select wire:model.live="kategoriId" name="kategori_id" id="KategoriId" class="form-select"
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
                        <select wire:model.live="merkId" name="merk_id" id="MerkId" class="form-select" required>
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
                        <select wire:model.live="tipeProdukId" name="tipe_id" id="TipeId" class="form-select" required>
                            <option value="none" disabled selected>---Pilih Merk---</option>
                            @foreach ($tipe_produk as $t)
                                <option wire:key="{{ $t->id }}" value="{{ $t->id }}">{{ $t->tipe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Unit</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="unit" id="Unit" placeholder="1"
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Satuan</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="satuan" type="text" class="form-control" name="satuan" id="Satuan" readonly required>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mt-4">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="" class="">Tarif Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="tarif_sewa" type="text" class="form-control" name="tarif_sewa" id="TarifSewa" readonly required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Lama Sewa</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="lama_sewa" id="LamaSewa"
                            placeholder="1 (hari)" required>
                        <p class="text-muted" id="LbTotalSewa">Total Tarif Sewa : </p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Komisi Kirim</label>
                    </div>
                    <div class="col-md-8">
                        <input wire:model.live="komisi_kirim" type="text" class="form-control" name="komisi_kirim" id="KomisiKirim" readonly
                            required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">X Komisi</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="xKomisi" id="XKomisi" placeholder="1"
                            required>
                        <p class="text-muted" id="LbTotalKomisi">Total Komisi : </p>
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
                    <th scope="col">X Kirim</th>
                    <th scope="col">Total Komisi Kirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_transaksi as $dt)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dt->tipe->tipe }}</td>
                        <td>{{ $dt->unit_out }}</td>
                        <td>{{ $dt->tipe->satuan }}</td>
                        <td>{{ $dt->tipe->tarif_sewa }}</td>
                        <td>{{ $dt->lama_sewa }}</td>
                        <td>{{ $dt->tarif_sewa }}</td>
                        <td>{{ $dt->tipe->komisi_kirim }}</td>
                        <td>{{ $dt->x_komisi }}</td>
                        <td>{{ $dt->komisi_kirim }}</td>
                        <td>
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

            </tbody>
        </table>
    </div>



    <form action="/transaksi-sewa/detailOrder/update" class="mt-5" method="POST">
        @csrf
        <input type="hidden" name="jumlah_bayar" id="JumlahBayar">
        <input type="hidden" name="no_nota" value="{{ $transaksi->no_nota }}">
        <input type="hidden" name="total_sewa" value="{{ $total_biaya_sewa }}">
        <input type="hidden" name="total_komisi" value="{{ $total_komisi_kirim }}">
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
                        <input type="number" placeholder="Rp." class="form-control" name="uang_muka"
                            id="UangMuka" value="{{ $transaksi->uang_muka }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Biaya Kirim/Ambil</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" placeholder="Rp." class="form-control" name="biaya_kirim_ambil"
                            id="BiayaKirimAmbil" value="{{ $transaksi->biaya_kirim_ambil }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Diskon</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" placeholder="%" class="form-control" name="diskon" id="Diskon"
                            required>
                    </div>
                </div>
                <p class="mt-3"><b id="Sisa">Sisa :</b></p>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/nota/penyewaan/{{ $transaksi->id }}" target="_blank" class="btn btn-success">Cetak Nota
                    Penyewaan</a>
            </div>
        </div>
    </form>


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

        // $(document).ready(function() {
        //     $('#KategoriId').change(function() {
        //         var KategoriId = $(this).val();
        //         if (KategoriId) {
        //             $.ajax({
        //                 type: "GET",
        //                 url: "/getMerk?KategoriId=" + KategoriId,
        //                 dataType: 'JSON',
        //                 success: function(res) {
        //                     if (res) {
        //                         $("#MerkId").empty();
        //                         $("#TipeId").empty();
        //                         $("#MerkId").append(
        //                             '<option disabled selected>---Pilih Merk---</option>');
        //                         $("#TipeId").append(
        //                             '<option disabled selected>---Pilih Tipe---</option>');
        //                         $.each(res, function(merk, id) {
        //                             $("#MerkId").append('<option value="' + id +
        //                                 '">' + merk + '</option>');
        //                         });
        //                     } else {
        //                         $("#MerkId").empty();
        //                         $("#TipeId").empty();
        //                     }
        //                 }
        //             });
        //         } else {
        //             $("#MerkId").empty();
        //             $("#TipeId").empty();
        //         }
        //     });

        //     $('#MerkId').change(function() {
        //         var MerkId = $(this).val();
        //         if (MerkId) {
        //             $.ajax({
        //                 type: "GET",
        //                 url: "/getTipe?merk_id=" + MerkId,
        //                 dataType: 'JSON',
        //                 success: function(res) {
        //                     if (res) {
        //                         $("#TipeId").empty();
        //                         $("#TipeId").append(
        //                             '<option disabled selected>---Pilih Tipe---</option>');
        //                         $.each(res, function(tipe, id) {
        //                             $("#TipeId").append('<option value="' + id +
        //                                 '">' + tipe + '</option>');
        //                         });
        //                     } else {
        //                         $("#TipeId").empty();
        //                     }
        //                 }
        //             });
        //         } else {
        //             $("#TipeId").empty();
        //         }
        //     });


        //     $('#TipeId').change(function() {
        //         var TipeId = $(this).val();
        //         if (TipeId) {
        //             $.ajax({
        //                 type: "GET",
        //                 url: "/tipeDetail?tipe_id=" + TipeId,
        //                 dataType: 'JSON',
        //                 success: function(res) {
        //                     if (res) {
        //                         $('#Satuan').val(res.satuan);
        //                         $('#TarifSewa').val(res.tarif_sewa);
        //                         $('#KomisiKirim').val(res.komisi_kirim);
        //                     } else {

        //                     }
        //                 }
        //             });
        //         } else {

        //         }
        //     });

        //     // Lama sewa Listener
        //     $('#LamaSewa').change(function() {
        //         let total = $('#TarifSewa').val() * $('#Unit').val() * $('#LamaSewa').val();
        //         $('#LbTotalSewa').text('Total Tarif Sewa : Rp.' + total);
        //         $('#TotalTarifSewa').val(total);
        //     });
        //     // Unit Listener
        //     $('#Unit').change(function() {
        //         let total = $('#TarifSewa').val() * $('#Unit').val() * $('#LamaSewa').val();
        //         $('#LbTotalSewa').text('Total Tarif Sewa : Rp.' + total);
        //         $('#TotalTarifSewa').val(total);
        //     });
        //     // KomisiKirimListener
        //     $('#XKomisi').change(function() {
        //         let total = $('#KomisiKirim').val() * $('#XKomisi').val();
        //         $('#LbTotalKomisi').text('Total Komisi : Rp.' + total);
        //         $('#TotalKomisiKirim').val(total);
        //     });
        //     // Listener UangMuka
        //     $('#UangMuka').change(function() {
        //         $('#Diskon').val(null);
        //         let dp = $(this).val();
        //         let total = {{ $total_komisi_kirim }} + {{ $total_biaya_sewa }} + Number($(
        //             '#BiayaKirimAmbil').val());
        //         $('#Sisa').text('Sisa : ' + formatToRupiah(total - dp));
        //         $('#JumlahBayar').val(total);
        //     });
        //     // Listener Biaya Kirim Ambil
        //     $('#BiayaKirimAmbil').change(function() {
        //         let biaya = $(this).val();
        //         $('#Diskon').val(null);
        //         let total = {{ $total_komisi_kirim }} + {{ $total_biaya_sewa }} + Number(biaya);
        //         $('#Sisa').text('Sisa : ' + formatToRupiah(total - $('#UangMuka').val()));
        //         $('#Jumlah').text('Jumlah : ' + formatToRupiah(total));
        //         $('#JumlahBayar').val(total);
        //     });
        //     // Diskon Listener
        //     $('#Diskon').change(function() {
        //         let diskon = $(this).val();
        //         let total = {{ $total_komisi_kirim }} + {{ $total_biaya_sewa }} + Number($(
        //             '#BiayaKirimAmbil').val());
        //         let after_diskon = diskon / 100 * total;
        //         let jumlah_total = total - after_diskon;
        //         $('#JumlahBayar').val(jumlah_total);
        //         $('#Jumlah').text('Jumlah : ' + formatToRupiah(jumlah_total));
        //         $('#Sisa').text('Sisa : ' + formatToRupiah(jumlah_total - $('#UangMuka').val()));
        //     })
        // });
    </script>
@endsection
