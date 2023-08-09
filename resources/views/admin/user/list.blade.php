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
    <h1 class="mb-4">List Data User</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin-user" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Name">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                                    id="Name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Username">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('username')is-invalid @enderror"
                                    name="username" id="Username" placeholder="Masukkan Nama Pengguna"
                                    value="{{ old('username') }}" required>
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Email">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('email')is-invalid @enderror"
                                    name="email" id="Email" placeholder="Masukkan Email" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Password">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control @error('password')is-invalid @enderror"
                                    name="password" id="Password" placeholder="Masukkan Password"
                                    value="{{ old('password') }}" required>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="">Role</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_admin"
                                                id="flexRadioDefault1" value="admin"
                                                {{ old('is_admin') == 'admin' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Admin
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_admin"
                                                id="flexRadioDefault1" value="karyawan"
                                                @if (!old('is_admin')) {{ 'checked' }}
                                                    @elseif (old('is_admin') == 'karyawan')
                                                    {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Karyawan
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->is_admin ? 'Admin' : 'Karyawan' }}</td>
                        <td><a href="/admin-user/{{ $u->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/admin-user/{{ $u->id }}" class="d-inline"
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
