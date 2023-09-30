<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="0" cellpadding="1" cellspacing="1" style="width:423.6px">
        <tbody>
            <tr>
                <td style="width:212px"><span style="font-size:8px">No Nota : {{ $transaksi->no_nota }}</span></td>
                <td style="text-align:right; width:198px"><span style="font-size:8px">NOTA TRANSAKSI PENGAMBILAN
                        BARANG</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Tanggal : {{ $transaksi->tanggal }}</span></td>
                <td style="width:198px"><span style="font-size:8px">Atas Nama </span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Penyewa</span></td>
                <td style="width:198px"><span style="font-size:8px">Nama : {{ $transaksi->atasNama->nama }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Nama : {{ $transaksi->pelanggan->pelanggan ?? $transaksi->penyewaUmum->nama }}</span>
                </td>
                <td style="width:198px"><span style="font-size:8px">Alamat : {{ $transaksi->atasNama->alamat }}</span>
                </td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Alamat : {{ $transaksi->pelanggan->alamat ?? $transaksi->penyewaUmum->alamat }}</span>
                </td>
                <td style="width:198px">&nbsp;</td>
            </tr>
            <tr>
                <td style="width:212px">&nbsp;</td>
                <td style="width:198px"><span style="font-size:8px">Kota : {{ $transaksi->atasNama->kota }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Kota :{{ $transaksi->pelanggan->kota ?? $transaksi->penyewaUmum->kota }}</span></td>
                <td style="width:198px"><span style="font-size:8px">No Tlp :
                        {{ $transaksi->atasNama->no_telpon }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">No Tlp :
                        {{ $transaksi->pelanggan->no_telpon ?? $transaksi->penyewaUmum->no_telpon }}</span></td>
                <td style="width:198px">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <p>&nbsp;</p>

    <table border="1" cellpadding="1" cellspacing="1" style="width:427.6px">
        <tbody>
            <tr>
                <td style="width:35px"><span style="font-size:8px">No</span></td>
                <td style="width:104px"><span style="font-size:8px">Tipe Produk</span></td>
                <td style="width:32px"><span style="font-size:8px">Unit</span></td>
                <td style="width:51px"><span style="font-size:8px">Satuan</span></td>
            </tr>
        </tbody>
    </table>

    <table border="0" cellpadding="1" cellspacing="1" style="width:426.6px">
        <tbody>
            @foreach ($transaksi->detailTransaksi as $dt)
                <tr>
                    <td style="width:35px"><span style="font-size:8px">{{ $loop->iteration }}</span></td>
                    <td style="width:104px"><span style="font-size:8px">{{ $dt->tipe->tipe }}</span></td>
                    <td style="width:32px"><span style="font-size:8px">{{ $dt->unit_out }}</span></td>
                    <td style="width:52px"><span style="font-size:8px">{{ $dt->tipe->satuan }}</span></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <p><span style="font-size:8px"><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;</u></span></p>

    <p><span style="font-size:8px">Dikrim Hari :
            {{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('dddd') }}&nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; Tgl : {{ $transaksi->tanggal_kirim }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;Jam :{{ now()->locale('id')->isoFormat('H:mm') }}</span></p>

    <p><span style="font-size:8px">Ambil Hari&nbsp; :
            {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('dddd') }}&nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;Tgl : {{ $transaksi->tanggal_ambil }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
    </p>

    <p><span style="font-size:8px">TTD Penyewa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;TTD Pengambil&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
    </p>

    <p><span style="font-size:8px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>

    <p><span style="font-size:8px"><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;</u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;<u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></span></p>

    <p><span style="font-size:8px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>

    <p>&nbsp;</p>

</body>

</html>
