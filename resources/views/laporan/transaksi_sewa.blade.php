@extends('main.main')
@section('head')
    <link href="{{ asset('datatables/DataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="mb-4">Laporan Transaksi Sewa</h1>
    <button class="btn btn-success" id="print-pdf-btn">Print PDF</button>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>


    <script>
        $(document).ready(function() {
            var dataTable = $('#myTable').DataTable({
                scrollX: true
            });


            $('#print-pdf-btn').on('click', function() {
                var tableData = [];
                dataTable.rows().data().each(function(row) {
                    var rowData = [];
                    for (var i = 0; i < row.length; i++) {
                        rowData.push(row[i]);
                    }
                    tableData.push(rowData);
                });

                var docDefinition = {
                    content: [{
                            text: 'Data Table PDF Example',
                            style: 'header'
                        },
                        '\n',
                        {
                            table: {
                                headerRows: 1,
                                widths: [50, 50, 50,50,50], // Sesuaikan dengan jumlah kolom Anda
                                body: tableData
                            }
                        }
                    ],
                    styles: {
                        header: {
                            fontSize: 18,
                            bold: true
                        }
                    }
                };

                pdfMake.createPdf(docDefinition).download('datatable.pdf');
            });
        });
    </script>
@endsection
