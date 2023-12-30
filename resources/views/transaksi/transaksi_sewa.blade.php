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
    <livewire:transaksi.transaksi-controller />
@endsection
@section('bottom')
    <script src="{{ asset('datatables/jQuery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/DataTables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('#myTable').DataTable({
        //         scrollX: true
        //     });
        //     // Listerner Radio Box
        //     $("input[name='PenyewaType']").change(function() {
        //         console.log('ok');
        //         if ($(this).val() === 'PenyewaUmum') {
        //             $("#PenyewaUmumForm").show();
        //             $("#PelangganForm").hide();
        //             $("#PilihPelanggan").removeAttr("required");
        //             $("#NamaUmum").prop("required", true);
        //             $("#AlamatUmum").prop("required", true);
        //             $("#NoTelponUmum").prop("required", true);
        //             $("#KotaUmum").prop("required", true);
        //         } else if ($(this).val() === 'Pelanggan') {
        //             $("#PenyewaUmumForm").hide();
        //             $("#PelangganForm").show();
        //             $("#PilihPelanggan").prop("required", true);
        //             $("#NamaUmum").removeAttr("required");
        //             $("#AlamatUmum").removeAttr("required");
        //             $("#NoTelponUmum").removeAttr("required");
        //             $("#KotaUmum").removeAttr("required");
        //         }
        //     });

        // });
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
