@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data Merk</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/merk/{{ $merk->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="KategoriId" class="form-label">Kategori</label>
                    </div>
                    <div class="col-md-9">
                        <select name="kategori_id" id="KategoriId" class="form-select" required>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}"{{ $k->id == $merk->kategori_id ? 'selected' : '' }}>{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Merk" class="form-label">Merk</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('merk')is-invalid @enderror" name="merk"
                            id="Merk" placeholder="Masukkan Merk" value="{{ old('merk') ?? $merk->merk }}" required>
                        @error('merk')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                       <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
