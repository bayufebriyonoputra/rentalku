@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data pelanggan</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/pelanggan/{{ $pelanggan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="Pelanggan">Pelanggan</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('pelanggan')is-invalid @enderror" name="pelanggan"
                            id="Pelanggan" placeholder="Masukkan nama pelanggan" value="{{ old('pelanggan') ?? $pelanggan->pelanggan }}" required>
                        @error('pelanggan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Alamat">alamat</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="alamat" rows="3" class="form-control">{{ old('alamat') ?? $pelanggan->alamat }}</textarea>
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Kota">Kota</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('kota')is-invalid @enderror" name="kota"
                            id="Kota" placeholder="Masukkan kota" value="{{ old('kota') ?? $pelanggan->kota }}" required>
                        @error('kota')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Notelpon">No Telepon</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('no_telpon')is-invalid @enderror" name="no_telpon"
                            id="Notelpon" placeholder="Masukkan Nomor Telepon" value="{{ old('no_telpon') ?? $pelanggan->no_telpon }}" required>
                        @error('no_telpon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
