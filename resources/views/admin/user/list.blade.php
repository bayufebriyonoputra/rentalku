@extends('admin.main')
<link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@section('head')
@endsection
@section('content')

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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped mt-4" id="myTable">
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
                        <td><a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="" class="d-inline">
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

@endsection
@section('bottom')
    <script src="{{ asset('datatables/jQuery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/DataTables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
