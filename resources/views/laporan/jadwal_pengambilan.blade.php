@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="mb-4">Laporan Jadwal Pengambilan</h1>



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
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_ambil)->locale('id')->isoFormat('dddd, D MMM YYYY') }}</td>
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
    <script>
        $(document).ready(function() {
            var dataTable = $('#myTable').DataTable({
                scrollX: true
            });
        });
    </script>
@endsection
