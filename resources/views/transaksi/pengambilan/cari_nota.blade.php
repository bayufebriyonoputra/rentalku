@extends('main.main')
@section('content')
    <div class="card">
        <div class="card-header">
           Transaksi Pengambilan Barang
        </div>
        <div class="card-body">
          <form action="/pengambilan/cari">
            <label for="">Masukkan No Nota</label>
            <input type="text" class="form-control" name="no_nota" placeholder="Masukkan No Nota Pemesanan" required>
            <button type="submit" class="btn btn-primary mt-2">submit</button>
          </form>
        </div>
    </div>
@endsection
