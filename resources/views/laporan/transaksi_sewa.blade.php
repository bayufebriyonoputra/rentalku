@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/button-datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="mb-4">Laporan Transaksi Sewa</h1>
    <p class="text-muted">Filter</p>
    <form action="" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <label for="">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal" value="{{ $tanggal_awal ?? date('Y-m-d')}}">
            </div>
            <div class="col-md-6">
                <label for="">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir" value="{{ $tanggal_akhir ?? date('Y-m-d') }}">
            </div>

            <div class="col-md-6">
                <label for="">Status Pengiriman</label>
                <select name="status_pengiriman" class="form-select">
                    <option value="semua" {{ $status_pengiriman === 'semua' ? 'selected' : '' }}>Semua</option>
                    <option value="dikirim" {{ $status_pengiriman === 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Penyewa</label>
                <select name="penyewa" class="form-select">
                    <option value="semua" {{ $penyewa === 'semua' ? 'selected' : '' }}>Semua</option>
                    @foreach ($pelanggan as $p)
                        <option value="{{ $p->id }}" {{ $penyewa == $p->id ? 'selected' : '' }}>{{ $p->pelanggan }}
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
                    <th scope="col">No Nota</th>
                    <th scope="col">Total Tarif Sewa</th>
                    <th>Biaya Kirim Ambil</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $t->no_nota }}</td>
                        <td>{{ formatRupiah($t->total_sewa) }}</td>
                        <td>{{ formatRupiah($t->biaya_kirim_ambil) }}</td>
                        <td>{{ formatRupiah($t->biaya_kirim_ambil + $t->total_sewa) }}</td>
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
                        filename: 'Transaksi Sewa {{ now() }}',
                        title: 'Laporan Sewa',

                    }
                ]
            });

        });
    </script>
@endsection
