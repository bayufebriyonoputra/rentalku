@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-title">
            <div class="container">
                <h3 class="mt-3 ms-4">Edit Data Karyawan</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/karyawan/{{ $karyawan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="Nama">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('nama')is-invalid @enderror" name="nama"
                            id="Nama" placeholder="Masukkan nama" value="{{ old('nama') ?? $karyawan->nama }}" required>
                        @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="JenisKelamin">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-9">
                        <select name="jenis_kelamin" id="JenisKelamin" class="form-control" required>
                            <option value="L" {{ $karyawan->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki Laki
                            </option>
                            <option value="P" {{ $karyawan->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="TTL">Tempat/Tanggal Lahir</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="ttl" id="TTL"
                            class="form-control @error('ttl')is-invalid @enderror" placeholder="Tempat Lahir..." value="{{ ambilLokasi($karyawan->ttl) }}" required>
                        @error('ttl')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="ttl_date" id="TTLDate" class="form-control" value="{{ ambilTanggal($karyawan->ttl) }}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Alamat">Alamat</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="alamat" id="Alamat" rows="3" class="form-control @error('alamat')is-invalid @enderror"
                            required>{{ old('alamat') ?? $karyawan->alamat}}</textarea>
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Kota">kota</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('kota')is-invalid @enderror" name="kota"
                            id="Kota" placeholder="Masukkan kota" value="{{ old('kota') ?? $karyawan->kota}}" required>
                        @error('kota')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="NoTelpon">No Telepon</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('no_telpon')is-invalid @enderror" name="no_telpon"
                            id="NoTelpon" placeholder="Masukkan No Telepon" value="{{ old('no_telpon') ?? $karyawan->no_telpon}}" required>
                        @error('no_telpon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="NomorHP">Nomor HP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('no_hp')is-invalid @enderror" name="no_hp"
                            id="NomorHp" placeholder="Masukkan No HP" value="{{ old('no_hp') ?? $karyawan->no_hp}}" required>
                        @error('no_hp')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Posisi">Posisi</label>
                    </div>
                    <div class="col-md-9">
                        <select name="posisi" id="Posisi" class="form-select" required>
                            <option value="lapangan" {{ $karyawan->posisi == 'lapangan' ? 'selected' : '' }}>Lapangan
                            </option>
                            <option value="kantor" {{ $karyawan->posisi == 'kantor' ? 'selected' : '' }}>Kantor
                            </option>
                        </select>
                        @error('posisi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="Status">status</label>
                    </div>
                    <div class="col-md-9">
                        <select name="status" id="Status" class="form-select" required>
                            <option value="aktif" {{ $karyawan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ $karyawan->status == 'nonaktif' ? 'selected' : '' }}>NonAktif
                            </option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="UangMakan">Uang Makan/Hari (Rp)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('uang_makan')is-invalid @enderror"
                            name="uang_makan" id="UangMakan" placeholder="Rp." value="{{ old('uang_makan') ?? $karyawan->uang_makan }}"
                            required>
                        @error('uang_makan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="UangHarian">Uang Harian/Shift (Rp)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('uang_harian')is-invalid @enderror"
                            name="uang_harian" id="UangHarian" placeholder="Rp." value="{{ old('uang_harian') ?? $karyawan->uang_harian }}"
                            required>
                        @error('uang_harian')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="UangLembur">Uang Lembur/Jam (Rp)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control @error('uang_lembur')is-invalid @enderror"
                            name="uang_lembur" id="UangLembur" placeholder="Rp." value="{{ old('uang_lembur') ?? $karyawan->uang_lembur }}"
                            required>
                        @error('uang_lembur')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
