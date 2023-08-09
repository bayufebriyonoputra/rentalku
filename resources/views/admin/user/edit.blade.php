@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data User</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin-user/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-2">
                        <label for="Name" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                            id="Name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') ?? $user->name }}"
                            required>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="Username" class="form-label">Username</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('username')is-invalid @enderror" name="username"
                            id="Username" placeholder="Masukkan Nama Pengguna"
                            value="{{ old('username') ?? $user->username }}" required>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="Email" class="form-label">Email</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('email')is-invalid @enderror" name="email"
                            id="Email" placeholder="Masukkan Email" value="{{ old('email') ?? $user->email }}" required>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="" class="form-label">Role</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_admin" id="flexRadioDefault1"
                                        value="admin"
                                        @if (old('is_admin') == 'admin') {{ 'checked' }}
                                            @elseif ($user->is_admin == 1)
                                            {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_admin" id="flexRadioDefault1"
                                        value="karyawan"
                                        @if (old('is_admin') == 'karyawan') {{ 'checked' }}
                                        @elseif ($user->is_admin == 0)
                                        {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Karyawan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
