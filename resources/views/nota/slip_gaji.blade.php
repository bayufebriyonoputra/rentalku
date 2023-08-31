<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="0" cellpadding="1" cellspacing="1" style="height:59px; width:424px">
        <tbody>
            <tr>
                <td style="width:212px"><strong><span style="font-size:20px">Untung Jaya</span></strong></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:12px">Jl. Palas Raya No.12</span></td>
            </tr>
            <tr>
                <td style="width:212px">Mojokerto</td>
            </tr>
        </tbody>
    </table>

    <p><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></p>

    <p><span style="font-size:18px"><strong>Slip Gaji</strong></span></p>

    <table border="0" cellpadding="1" cellspacing="1" style="width:417.833px">
        <tbody>
            <tr>
                <td style="width:175px">Nama Karyawan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ $gaji->karyawan->nama }}</td>
            </tr>
            <tr>
                <td style="width:175px">Tanggal Penggajian</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ $gaji->tanggal }}</td>
            </tr>
            <tr>
                <td style="width:175px">Periode Penggajian</td>
                <td style="width:58px">=</td>
                <td style="width:167px">
                <p>{{ $gaji->tanggal_awal }} - {{ $gaji->tanggal_akhir }}</p>
                </td>
            </tr>
            <tr>
                <td style="width:175px">No Bukti</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ $gaji->no_bukti }}</td>
            </tr>
            <tr>
                <td style="width:175px">Komisi Karyawan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->komisi_karyawan) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Harian</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->harian) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Sopir</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->sopir) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Lembur</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->lembur) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Uang Makan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->uang_makan) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Penerimaan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->penerimaan) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Pinjaman Karyawan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->pinjaman_karyawan) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Potongan</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->potongan) }}</td>
            </tr>
            <tr>
                <td style="width:175px">Saldo</td>
                <td style="width:58px">=</td>
                <td style="width:167px">{{ formatRupiah($gaji->saldo) }}</td>
            </tr>
        </tbody>
    </table>

    <p><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></p>

</body>
</html>
