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
    <h1 class="mb-4">List Data Paket</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan Paket
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tipe</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/paket" method="POST">
                    @csrf
                    <div class="modal-body">




                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Paket" class="form-label">Nama Paket</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('paket')is-invalid @enderror"
                                    name="paket" id="Paket" placeholder="Masukkan Nama Paket"
                                    value="{{ old('paket') }}" required>
                                @error('paket')
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
                    <th scope="col">Nama Paket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paket as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->paket }}</td>
                        <td>
                            <a href="/paket/{{$p->id}}" class="btn btn-info">Edit Tipe</a>
                            <a href="/paket/edit/{{ $p->id }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/paket/{{ $p->id }}" class="d-inline" id="myForm{{ $loop->iteration }}"
                                method="POST">
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
