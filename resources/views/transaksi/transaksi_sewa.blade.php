@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.min.css') }}">
@endsection
@section('content')
    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
    <h1 class="mb-4">Transaksi Penyewaan Barang</h1>

    <p class="text-muted">Input Transaksi</p>
    <form action="/transaksi-sewa" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <p class="mt-4 text-muted"><b>Data Transaksi</b></p>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Pesan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="col-md-9 form-control" name="tanggal"
                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Kirim</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="col-md-9 form-control" name="tanggal_kirim"
                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Tanggal Ambil</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="col-md-9 form-control" name="tanggal_ambil"
                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">No Nota</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="col-md-9 form-control" name="no_nota" value="{{ $no_nota }}"
                            readonly required>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mt-4">
                {{-- Radio Button --}}
                <p>Pilih Jenis Pelanggan</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PenyewaType" id="Pelanggan"
                                value="Pelanggan" checked>
                            <label class="form-check-label" for="Pelanggan">
                                Pelanggan
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PenyewaType" id="PenyewaUmum"
                                value="PenyewaUmum">
                            <label class="form-check-label" for="PenyewaUmum">
                                Penyewa Umum
                            </label>
                        </div>
                    </div>
                </div>


                {{-- Pelanggan --}}
                <div class="pelanggan" id="PelangganForm">
                    <p class="text-muted"><b>Data Pelanggan</b></p>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="">Pilih Pelanggan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pelanggan_id" id="PilihPelanggan" class="form-select" >
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id }}">{{ $p->pelanggan }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                {{-- Penyewa Umum --}}
                <div class="penyewa-umum" id="PenyewaUmumForm" style="display: none;">
                    <p class="text-muted"><b>Penyewa Umum</b></p>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="" class="">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="NamaUmum" class="col-md-9 form-control" name="nama_umum">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="" class="">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="alamat_umum" id="AlamatUmum" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="" class="">No Telepon</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="col-md-9 form-control" name="no_telpon_umum" id="NoTelponUmum" >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="" class="">Kota</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="col-md-9 form-control" name="kota_umum" id="KotaUmum" >
                        </div>
                    </div>

                </div>

                <p class="text-muted"><b>Atas Nama</b></p>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Nama</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="col-md-9 form-control" name="nama" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Alamat</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="alamat" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">No Telepon</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="col-md-9 form-control" name="no_telpon" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="" class="">Kota</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="col-md-9 form-control" name="kota" required>
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
                    <th scope="col">Total Sewa</th>
                    <th scope="col">Biaya Kirim Ambil</th>
                    <th scope="col">Uang Muka</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $t->no_nota }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tannggal)->locale('id')->isoFormat('dddd D-MM-YYYY', 'dddd') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_kirim)->locale('id')->isoFormat('dddd D-MM-YYYY', 'dddd') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_ambil)->locale('id')->isoFormat('dddd D-MM-YYYY', 'dddd') }}
                        </td>
                        <td>{{ formatRupiah($t->total_sewa) }}</td>
                        <td>{{ formatRupiah($t->biaya_kirim_ambil) }}</td>
                        <td>{{ formatRupiah($t->uang_muka) }}</td>
                        <td>{{ $t->pelanggan->pelanggan ?? 'Penyewa Umum' }}</td>
                        <td><a href="/transaksi-sewa/{{ $t->id }}/edit" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
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
            // Listerner Radio Box
            $("input[name='PenyewaType']").change(function() {
                console.log('ok');
                if ($(this).val() === 'PenyewaUmum') {
                    $("#PenyewaUmumForm").show();
                    $("#PelangganForm").hide();
                    $("#PilihPelanggan").removeAttr("required");
                    $("#NamaUmum").prop("required", true);
                    $("#AlamatUmum").prop("required", true);
                    $("#NoTelponUmum").prop("required", true);
                    $("#KotaUmum").prop("required", true);
                } else if ($(this).val() === 'Pelanggan') {
                    $("#PenyewaUmumForm").hide();
                    $("#PelangganForm").show();
                    $("#PilihPelanggan").prop("required", true);
                    $("#NamaUmum").removeAttr("required");
                    $("#AlamatUmum").removeAttr("required");
                    $("#NoTelponUmum").removeAttr("required");
                    $("#KotaUmum").removeAttr("required");
                }
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
@endsection
