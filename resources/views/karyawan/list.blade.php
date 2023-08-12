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
    <h1 class="mb-4">List Data Karyawan</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan Karyawan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/karyawan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Nama">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('nama')is-invalid @enderror" name="nama"
                                    id="Nama" placeholder="Masukkan nama" value="{{ old('nama') }}" required>
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
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki Laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
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
                                    class="form-control @error('ttl')is-invalid @enderror" placeholder="Tempat Lahir..."
                                    required>
                                @error('ttl')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="ttl_date" id="TTLDate" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Alamat">Alamat</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="alamat" id="Alamat" rows="3" class="form-control @error('alamat')is-invalid @enderror"
                                    required>{{ old('alamat') }}</textarea>
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
                                    id="Kota" placeholder="Masukkan kota" value="{{ old('kota') }}" required>
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
                                <input type="number" class="form-control @error('no_telpon')is-invalid @enderror"
                                    name="no_telpon" id="NoTelpon" placeholder="Masukkan No Telepon"
                                    value="{{ old('no_telpon') }}" required>
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
                                <input type="number" class="form-control @error('no_hp')is-invalid @enderror"
                                    name="no_hp" id="NomorHp" placeholder="Masukkan No HP"
                                    value="{{ old('no_hp') }}" required>
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
                                    <option value="lapangan" {{ old('posisi') == 'lapangan' ? 'selected' : '' }}>Lapangan
                                    </option>
                                    <option value="kantor" {{ old('posisi') == 'kantor' ? 'selected' : '' }}>Kantor
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
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>NonAktif
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
                                    name="uang_makan" id="UangMakan" placeholder="Rp." value="{{ old('uang_makan') }}"
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
                                    name="uang_harian" id="UangHarian" placeholder="Rp."
                                    value="{{ old('uang_harian') }}" required>
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
                                    name="uang_lembur" id="UangLembur" placeholder="Rp."
                                    value="{{ old('uang_lembur') }}" required>
                                @error('uang_lembur')
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
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tempat Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Uang Makan</th>
                    <th scope="col">Uang Harian</th>
                    <th scope="col">Uang Lembur</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>{{ $k->ttl }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->kota }}</td>
                        <td>{{ $k->no_telpon }}</td>
                        <td>{{ $k->no_hp }}</td>
                        <td>{{ $k->posisi }}</td>
                        <td>{{ $k->status }}</td>
                        <td>{{ formatRupiah($k->uang_makan) }}</td>
                        <td>{{ formatRupiah($k->uang_harian) }}</td>
                        <td>{{ formatRupiah($k->uang_lembur) }}</td>
                        <td><a href="/karyawan/{{ $k->id }}/edit" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/karyawan/{{ $k->id }}" class="d-inline"
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
