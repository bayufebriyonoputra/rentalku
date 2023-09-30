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
                <td style="width:212px">&nbsp;</td>
                <td style="text-align:right; width:198px"><strong><span style="font-size:8px">PERHITUNGAN KOMISI
                            KIRIM</span></strong></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Kepada YTH :
                        {{ $transaksi->pelanggan->pelanggan ?? $transaksi->penyewaUmum->nama }}</span></td>
                <td style="width:198px"><span style="font-size:8px">No Nota : {{ $transaksi->no_nota }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span
                        style="font-size:8px">{{ $transaksi->pelanggan->alamat ?? $transaksi->penyewaUmum->alamat }}</span>
                </td>
                <td style="width:198px"><span style="font-size:8px">Tanggal :{{ $transaksi->tanggal }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span
                        style="font-size:8px">{{ $transaksi->pelanggan->kota ?? $transaksi->penyewaUmum->kota }}</span>
                </td>
                <td style="width:198px">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <p>&nbsp;</p>

    <table border="1" cellpadding="1" cellspacing="1" style="width:427.6px">
        <tbody>
            <tr>
                <td style="width:30px"><span style="font-size:8px">No</span></td>
                <td style="width:141px"><span style="font-size:8px">Tipe Produk</span></td>
                <td style="width:28px"><span style="font-size:8px">Unit</span></td>
                <td style="width:40px"><span style="font-size:8px">Satuan</span></td>
                <td style="width:64px"><span style="font-size:8px">Km Kirim</span></td>
                <td style="width:40px"><span style="font-size:8px">X Komisi</span></td>
                <td style="width:52px"><span style="font-size:8px">Jumlah</span></td>
            </tr>
        </tbody>
    </table>

    <table border="0" cellpadding="1" cellspacing="1" style="width:426.6px">
        <tbody>
            @foreach ($transaksi->detailTransaksi as $dt)
                <tr>
                    <td style="width:31px"><span style="font-size:8px">{{ $loop->iteration }}</span></td>
                    <td style="width:142px"><span style="font-size:8px">{{ $dt->tipe->tipe }}</span></td>
                    <td style="width:22px"><span style="font-size:8px">{{ $dt->unit_out }}</span></td>
                    <td style="width:42px"><span style="font-size:8px">{{ $dt->tipe->satuan }}</span></td>
                    <td style="width:65px"><span
                            style="font-size:8px">{{ formatRupiah($dt->tipe->komisi_kirim) }}</span></td>
                    <td style="width:40px"><span style="font-size:8px">{{ $dt->x_komisi }}</span></td>
                    <td style="width:52px"><span style="font-size:8px">{{ formatRupiah($dt->komisi_kirim) }}</span>
                    </td>
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

    <p><span style="font-size:8px"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Total Komisi Kirim :
                {{ formatRupiah($transaksi->detailTransaksi->sum('komisi_kirim')) }}
            </strong></span></p>

    <table border="1" cellpadding="1" cellspacing="1" style="width:234.455px">
        <tbody>
            <tr>
                <td style="width:128px"><span style="font-size:8px">Karyawan Yang Bertugas</span></td>
                <td style="width:95px"><span style="font-size:8px">Bagi Komisi</span></td>
            </tr>
        </tbody>
    </table>

    <table border="0" cellpadding="1" cellspacing="1" style="width:234.455px">
        <tbody>
            @foreach ($transaksi->pengiriman as $p)
                <tr>
                    <td style="width:128px"><span style="font-size:8px">{{ $p->karyawan->nama }}</span></td>
                    <td style="width:94px"><span style="font-size:8px">{{ formatRupiah($p->komisi) }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</u></p>

    <p><span style="font-size:8px">Total Komisi&nbsp; &nbsp;=&nbsp;
            {{ formatRupiah($transaksi->pengiriman->sum('komisi')) }}</span></p>

    <p><span style="font-size:8px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>

    <p>&nbsp;</p>

</body>

</html>
