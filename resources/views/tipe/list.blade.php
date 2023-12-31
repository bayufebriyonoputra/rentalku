@extends('main.main')
@section('head')
    {{-- <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('datatables/plugin/bs5.css') }}"
        rel="stylesheet">

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
    <h1 class="mb-4">List Data Tipe</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan Tipe
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tipe</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tipe" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-3">
                                <label for="KategoriId" class="form-label">Kategori Produk</label>
                            </div>
                            <div class="col-md-9">
                                <select name="kategori_id" id="KategoriId" class="form-select" required>
                                    <option value="" disabled selected>---Pilih Kategori---</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="MerkId" class="form-label">Merk Produk</label>
                            </div>
                            <div class="col-md-9">
                                <select name="merk_id" id="MerkId" class="form-select" required>
                                    <option value="" disabled selected>---Pilih Merk---</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Tipe" class="form-label">Tipe Produk</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('tipe')is-invalid @enderror" name="tipe"
                                    id="Tipe" placeholder="Masukkan tipe" value="{{ old('tipe') }}" required>
                                @error('tipe')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="TarifSewa" class="form-label">Tarif Sewa (Rp)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control @error('tarif_sewa')is-invalid @enderror"
                                    name="tarif_sewa" id="TarifSewa" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('tarif_sewa') }}" required>
                                @error('tarif_sewa')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="KomisiKirim" class="form-label">Komisi Kirim (Rp)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control @error('komisi_kirim')is-invalid @enderror"
                                    name="komisi_kirim" id="KomisiKirim" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('komisi_kirim') }}" required>
                                @error('komisi_kirim')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="KomisiAmbil" class="form-label">Komisi Ambil (Rp)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control @error('komisi_ambil')is-invalid @enderror"
                                    name="komisi_ambil" id="KomisiAmbil" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('komisi_ambil') }}" required>
                                @error('komisi_ambil')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Satuan" class="form-label">Satuan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('satuan')is-invalid @enderror"
                                    name="satuan" id="Satuan" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('satuan') }}" required>
                                @error('satuan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="SaldoAwal" class="form-label">Saldo Awal</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('saldo_awal')is-invalid @enderror"
                                    name="saldo_awal" id="SaldoAwal" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('saldo_awal') }}" required>
                                @error('saldo_awal')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Stock" class="form-label">Stock</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('stock')is-invalid @enderror"
                                    name="stock" id="Stock" placeholder="Masukkan Tarif Sewa"
                                    value="{{ old('stock') }}" required>
                                @error('stock')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div style="overflow-x: auto;">
        <table class="table table-striped mt-4 display nowrap" id="myTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Kategori Produk</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Tipe Produk</th>
                    <th scope="col">Tarif Sewa</th>
                    <th scope="col">Komisi Kirim</th>
                    <th scope="col">Komisi Ambil</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Saldo Awal</th>
                    <th scope="col">Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipe as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->barcode }}</td>
                        <td>{{ $p->merk->kategori->kategori ?? '-' }}</td>
                        <td>{{ $p->merk->merk ?? '-' }}</td>
                        <td>{{ $p->tipe }}</td>
                        <td>{{ formatRupiah($p->tarif_sewa) }}</td>
                        <td>{{ formatRupiah($p->komisi_kirim) }}</td>
                        <td>{{ formatRupiah($p->komisi_ambil) }}</td>
                        <td>{{ $p->satuan }}</td>
                        <td>{{ $p->saldo_awal }}</td>
                        <td>{{ $p->stock }}</td>
                        <td><a href="/tipe/{{ $p->id }}/edit" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/tipe/{{ $p->id }}" class="d-inline" id="myForm{{ $loop->iteration }}"
                                method="POST">
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
    {{-- <script src="{{ asset('datatables/DataTables/js/dataTables.bootstrap5.min.js') }}"></script> --}}
    <script src="{{ asset('datatables/plugin/bprint.min.js') }}"></script>
    <script src="{{ asset('datatables/plugin/buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/plugin/jszip.min.js') }}"></script>
    <script src="{{ asset('datatables/plugin/pdfmake.min.js') }}"></script>
    <script src="{{ asset('datatables/plugin/vsffont.js') }}"></script>
    <script src="{{ asset('datatables/plugin/buttons_html5.min.js') }}"></script>
    <script src="{{ asset('datatables/plugin/buttons_print.min.js') }}"></script>



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }]
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
        $(document).ready(function() {
            $('#KategoriId').change(function() {
                var KategoriId = $(this).val();
                if (KategoriId) {
                    $.ajax({
                        type: "GET",
                        url: "/getMerk?KategoriId=" + KategoriId,
                        dataType: 'JSON',
                        success: function(res) {
                            if (res) {
                                $("#MerkId").empty();
                                $("#MerkId").append(
                                    '<option disabled selected>---Pilih Merk---</option>');
                                $.each(res, function(merk, id) {
                                    $("#MerkId").append('<option value="' + id +
                                        '">' + merk + '</option>');
                                });
                            } else {
                                $("#MerkId").empty();
                            }
                        }
                    });
                } else {
                    $("#MerkId").empty();
                }
            });
        });
    </script>
@endsection
