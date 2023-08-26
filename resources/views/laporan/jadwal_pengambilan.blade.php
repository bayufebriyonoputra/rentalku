@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/button-datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="mb-4">Laporan Jadwal Pengambilan</h1>
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
                <label for="">Status Pengambilan</label>
                <select name="status_pengambilan" class="form-select">
                    <option value="semua" {{ $status_pengambilan === 'semua' ? 'selected' : '' }}>Semua</option>
                    <option value="diambil" {{ $status_pengambilan === 'diambil' ? 'selected' : '' }}>Diambil</option>
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
                    <th scope="col">No Nota</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th>Jadwal Ambil</th>
                    <th>Pelanggan</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>No Telpon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $t->no_nota }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal)->locale('id')->isoFormat('dddd, D MMM YYYY') }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_ambil)->locale('id')->isoFormat('dddd, D MMM YYYY') }}
                        </td>
                        <td>{{ $t->pelanggan->pelanggan }}</td>
                        <td>{{ $t->pelanggan->alamat }}</td>
                        <td>{{ $t->pelanggan->kota }}</td>
                        <td>{{ $t->pelanggan->no_telpon }}</td>
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
                        filename: 'Jadwal Pengambilan {{ now() }}',
                        title: 'Jadwal Pengambilan',
                        orientation: 'landscape',
                    }
                ]
            });
        });
    </script>
@endsection
