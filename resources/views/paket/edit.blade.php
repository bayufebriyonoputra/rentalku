@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data Paket</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/paket/{{ $paket->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="Paket">Nama Paket</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('paket')is-invalid @enderror" name="paket"
                            id="Paket" placeholder="Masukkan paket" value="{{ old('paket') ?? $paket->paket }}" required>
                        @error('paket')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
