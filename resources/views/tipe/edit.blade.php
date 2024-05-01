@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data Tipe</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/tipe/{{ $tipe->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="KategoriId" class="form-label">Kategori Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select name="kategori_id" id="KategoriId" class="form-select" required>
                            <option value="" disabled selected>---Pilih Kategori---</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $tipe->merk->kategori->id ? 'selected' : '' }}>{{ $k->kategori }}</option>
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
                            <option value="{{ $tipe->merk->id }}" selected>{{ $tipe->merk->merk }}</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Tipe" class="form-label">Tipe Produk</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('tipe')is-invalid @enderror" name="tipe"
                            id="Tipe" placeholder="Masukkan tipe" value="{{ old('tipe') ?? $tipe->tipe }}" required>
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
                            value="{{ old('tarif_sewa') ?? $tipe->tarif_sewa }}" required>
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
                            value="{{ old('komisi_kirim') ?? $tipe->komisi_kirim }}" required>
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
                            value="{{ old('komisi_ambil') ?? $tipe->komisi_ambil }}" required>
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
                        <input type="text" class="form-control @error('satuan')is-invalid @enderror" name="satuan"
                            id="Satuan" placeholder="Masukkan Tarif Sewa" value="{{ old('satuan') ?? $tipe->satuan }}" required>
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
                            value="{{ old('saldo_awal') ?? $tipe->saldo_awal }}" required>
                        @error('saldo_awal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="SaldoAwal" class="form-label">Barcode</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('barcode')is-invalid @enderror"
                            name="barcode" id="SaldoAwal" placeholder="Masukkan kode"
                            value="{{ old('barcode') ?? $tipe->barcode }}" required>
                        @error('barcode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Stock" class="form-label">Stock</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('stock')is-invalid @enderror" name="stock"
                            id="Stock" placeholder="Masukkan Tarif Sewa" value="{{ old('stock') ?? $tipe->stock }}" required>
                        @error('stock')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection

@section('bottom')
    <script src="{{ asset('datatables/jQuery/jquery-3.7.0.min.js') }}"></script>
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
