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
    <h1 class="mb-4">List Data Absensi</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan Absensi
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Catat Absen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/kategori" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="KaryawanId">Karyawan</label>
                            </div>
                            <div class="col-md-9">
                                <select name="karyawan_id" id="KaryawanId" class="form-select" required>
                                    @foreach ($karyawan as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Tanggal">Tanggal</label>
                            </div>
                            <div class="col-md-9">
                               <input type="date" class="form-control" name="tanggal" value="{{ now()->format('d-m-Y') }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Shift">Shift</label>
                            </div>
                            <div class="col-md-9">
                               <select name="shift" id="Shift" class="form-select" required>
                                <option value="Shift 1">Shift 1</option>
                                <option value="Shift 2">Shift 2</option>
                               </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Shift">Lembur</label>
                            </div>
                            <div class="col-md-5">
                               <input type="time" id="start" class="form-control">
                            </div>
                            <div class="col-md-4">
                               <input type="time" id="finish" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="UangHarian">Uang Harian/Shift</label>
                            </div>
                            <div class="col-md-9">
                               <input type="number" class="form-control" id="UangHarian" name="uang_harian" placeholder="Rp." required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="UangMakan">Uang Makan/Hari</label>
                            </div>
                            <div class="col-md-9">
                               <input type="number" class="form-control" id="UangMakan" name="uang_makan" placeholder="Rp." required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="UpahLembur">Upah Lembur/Jam</label>
                            </div>
                            <div class="col-md-9">
                               <input type="number" class="form-control" id="UangLembur" name="uang_lembur" placeholder="Rp." required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Lembur">Total Uang Lembur</label>
                            </div>
                            <div class="col-md-9">
                               <input type="number" class="form-control" id="Lembur" name="lembur" placeholder="Jam" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="TotalLembur">Total Uang Lembur</label>
                            </div>
                            <div class="col-md-9">
                               <input type="number" class="form-control" id="TotalLembur" name="total_uang_lembur" placeholder="Jam" required>
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
                    <th scope="col">Tangggal</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Upah Harian</th>
                    <th scope="col">Uang Makan</th>
                    <th scope="col">Upah Lembur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absen as $a)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $a->karyawan->nama }}</td>
                        <td>{{ $a->tanggal }}</td>
                        <td>{{ $a->shift }}</td>
                        <td>{{ formatRupiah($a->upah_harian) }}</td>
                        <td>{{ formatRupiah($a->uang_makan) }}</td>
                        <td>{{ formatRupiah($a->uang_lembur) }}</td>
                        <td><a href="/kategori/{{ $a->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/kategori/{{ $a->id }}" class="d-inline"
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
