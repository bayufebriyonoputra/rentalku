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
    <h1 class="mb-4">List Data Pinjaman Karyawan</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-circle-plus"></i> &nbsp;&nbsp;Tambahkan Pinjaman
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Catat Absen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/pinjaman" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="KaryawanId">Karyawan</label>
                            </div>
                            <div class="col-md-9">
                                <select name="karyawan_id" id="KaryawanId" class="form-select" required>
                                    <option value="" disabled selected>---Pilih Karyawan---</option>
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
                                <input type="date" class="form-control" name="tanggal"
                                    value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Transaksi">Transaksi</label>
                            </div>
                            <div class="col-md-9">
                                <select name="transaksi" id="Transaksi" class="form-select" required>
                                    <option value="pinjaman">Pinjaman</option>
                                    <option value="pengembalian">Pengembalian</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Keterangan">Keterangan</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="keterangan" id="Keterangan"  rows="3" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="Nominal">Nominal</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="Nominal" name="nominal"
                                    placeholder="Rp." required>
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
                    <th scope="col">No Bukti</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Pinjaman</th>
                    <th scope="col">Pengembalian</th>
                    <th scope="col">Saldo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjaman as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->karyawan->nama }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->no_bukti }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>{{ formatRupiah($p->pinjaman) }}</td>
                        <td>{{ formatRupiah($p->pengembalian) }}</td>
                        <td>{{ formatRupiah($p->saldo) }}</td>
                        <td>
                            <form action="/pinjaman/{{ $p->id }}" class="d-inline"
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

    <script>
        function hitungSelisihJam(jamAwal, jamAkhir) {
            // Pecah jamAwal dan jamAkhir menjadi jam dan menit
            const [jamAwalHours, jamAwalMinutes] = jamAwal.split(':').map(Number);
            const [jamAkhirHours, jamAkhirMinutes] = jamAkhir.split(':').map(Number);

            // Buat objek Date untuk tanggal referensi
            const today = new Date();
            const jamAwalDate = new Date(today.getFullYear(), today.getMonth(), today.getDate(), jamAwalHours,
                jamAwalMinutes);
            const jamAkhirDate = new Date(today.getFullYear(), today.getMonth(), today.getDate(), jamAkhirHours,
                jamAkhirMinutes);

            // Hitung selisih dalam milidetik
            let selisihMilidetik = jamAkhirDate - jamAwalDate;

            // Perhatikan batas waktu 24 jam
            if (selisihMilidetik < 0) {
                selisihMilidetik += 24 * 60 * 60 * 1000; // Tambahkan 24 jam dalam milidetik
            }

            // Hitung selisih jam dan bulatkan
            const selisihJam = Math.floor(selisihMilidetik / (60 * 60 * 1000));
            return selisihJam;
        }

        $(document).ready(function() {
            $('#KaryawanId').change(function() {
                var KaryawanId = $(this).val();
                if (KaryawanId) {
                    $.ajax({
                        type: "GET",
                        url: "/getKaryawan?karyawan_id=" + KaryawanId,
                        dataType: 'JSON',
                        success: function(res) {
                            if (res) {
                                // console.log(res);
                                $('#UangHarian').val(res.uang_harian);
                                $('#UangMakan').val(res.uang_makan);
                                $('#UangLembur').val(res.uang_lembur);
                                $('#UangLembur').trigger('change');
                            }
                        }
                    });
                }
            });

            // jam Lembur Listener
            $('#start').change(function(){
                $('#Lembur').val(hitungSelisihJam($('#start').val(), $('#finish').val()));
                $('#Lembur').trigger('change');
            });
            $('#finish').change(function(){
                $('#Lembur').val(hitungSelisihJam($('#start').val(), $('#finish').val()));
                $('#Lembur').trigger('change');
            });

            // Lembur Listener
            $('#Lembur').change(function(){

                let jam = $(this).val();
                $('#TotalLembur').val(Number($('#UangLembur').val()) * Number(jam));
            });
            $('#UangLembur').change(function(){

                let UangLembur = $(this).val();
                $('#TotalLembur').val(Number($('#Lembur').val()) * Number(UangLembur));
            });
        });
    </script>
@endsection
