@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data User</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/kategori/{{ $kategori->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="Kategori">Kategori</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('kategori')is-invalid @enderror" name="kategori"
                            id="Kategori" placeholder="Masukkan Kategori" value="{{ old('kategori') ?? $kategori->kategori }}" required>
                        @error('kategori')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Deskripsi">Deskripsi</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi') ?? $kategori->deskripsi }}</textarea>
                        @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
