@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/button-datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="mb-4">Laporan Absensi Karyawan</h1>
    <p class="text-muted">Filter</p>
    <form action="" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <label for="">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal" value="{{ $tanggal_awal }}">
            </div>
            <div class="col-md-6">
                <label for="">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir" value="{{ $tanggal_akhir }}">
            </div>

            <div class="col-md-6">
                <label for="">Karyawan</label>
                <select name="karyawan" class="form-select">
                    <option value="semua" {{ $karyawan === 'semua' ? 'selected' : '' }}>Semua</option>
                    @foreach ($karyawan as $k)
                        <option value="{{ $k->id }}" {{ $karyawan_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-3">Terapkan</button>
            </div>
        </div>
    </form>


    <div style="overflow-x: auto;">
        <table class="table table-striped mt-4 display nowrap" id="myTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Tanggal</th>
                    <th>Shift</th>
                    <th>Upah Harian</th>
                    <th>Uang Makan</th>
                    <th>Upah Lembur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $a)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $a->karyawan->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->isoFormat('dddd, D MMM YYYY') }}</td>
                        <td>{{ $a->shift }}</td>
                        <td>{{ $a->uang_harian }}</td>
                        <td>{{ $a->uang_makan }}</td>
                        <td>{{ $a->uang_lembur }}</td>
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
    <script src="{{ asset('datatables/pdf-make.min.js') }}"></script>
    <script src="{{ asset('datatables/font.min.js') }}"></script>
    <script src="{{ asset('datatables/html5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dataTable = $('#myTable').DataTable({
                scrollX: true,
                dom: 'Bfrtip', // Menentukan elemen-elemen yang akan ditampilkan
                buttons: [
                    'copy', 'excel', 'csv',
                    {
                        extend: 'pdf',
                        filename: 'Absensi Karyawan {{ now() }}',
                        title: 'Absensi Karyawan',
                    }
                ]
            });
        });
    </script>
@endsection
