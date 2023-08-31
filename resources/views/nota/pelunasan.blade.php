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
                <td style="text-align:right; width:198px"><span style="font-size:8px">NOTA TRANSAKSI PELUNASAN
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
                <td style="width:212px"><span style="font-size:8px">Nama : {{ $transaksi->pelanggan->pelanggan }}</span>
                </td>
                <td style="width:198px"><span style="font-size:8px">Alamat : {{ $transaksi->atasNama->alamat }}</span>
                </td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Alamat : {{ $transaksi->pelanggan->alamat }}</span>
                </td>
                <td style="width:198px">&nbsp;</td>
            </tr>
            <tr>
                <td style="width:212px">&nbsp;</td>
                <td style="width:198px"><span style="font-size:8px">Kota : {{ $transaksi->atasNama->kota }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">Kota :{{ $transaksi->pelanggan->kota }}</span></td>
                <td style="width:198px"><span style="font-size:8px">No Tlp :
                        {{ $transaksi->atasNama->no_telpon }}</span></td>
            </tr>
            <tr>
                <td style="width:212px"><span style="font-size:8px">No Tlp :
                        {{ $transaksi->pelanggan->no_telpon }}</span></td>
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
                <td style="width:63px"><span style="font-size:8px">Rp(@)</span></td>
                <td style="width:27px"><span style="font-size:8px">Hr</span></td>
                <td style="width:80px"><span style="font-size:8px">Jumlah(Rp)</span></td>
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
                    <td style="width:61px"><span style="font-size:8px">{{ $dt->tipe->tarif_sewa }}</span></td>
                    <td style="width:28px"><span style="font-size:8px">{{ $dt->lama_sewa }}</span></td>
                    <td style="width:79px"><span style="font-size:8px">{{ $dt->tarif_sewa }}</span></td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="a" style="line-height: 80%">
        <p><span style="font-size:8px;line-height: 80%"><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></span></p>

        <p><span style="font-size:8px;line-height: 80%">Dikrim Hari : {{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('dddd') }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; Tgl : {{ $transaksi->tanggal_kirim }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total Tarif Sewa :
               {{ formatRupiah($total_biaya_sewa) }}</span></p>

        <p><span style="font-size:8px;line-height: 80%">Ambil Hari&nbsp; : {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('dddd') }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;Tgl : {{ $transaksi->tanggal_ambil }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Biaya Kirim
                &amp; Ambil :{{ formatRupiah($transaksi->biaya_kirim_ambil) }}</span></p>

        <p><span style="font-size:8px;line-height: 80%">TTD Penyewa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TTD Pengirim&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; Jumlah : {{ formatRupiah($total_biaya_sewa + $total_komisi_kirim) }}</span></p>

        <p><span style="font-size:8px;line-height: 80%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Diskon(%) : {{ $transaksi->diskon ?? 0.0 }}</span></p>

        <p><span style="font-size:8px;line-height: 80%"><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;</u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Uang Muka : {{ formatRupiah($transaksi->uang_muka) }}</span></p>

        <p><span style="font-size:8px;line-height: 80%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pelunasan : {{ formatRupiah($transaksi->pelunasan) }}</span></p>
    </div>






</body>

</html>
