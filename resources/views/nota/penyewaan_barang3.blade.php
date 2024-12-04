<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
    </title>
    <style>
        @font-face {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: bold;
            src: local('â˜º'), url('font1.woff') format('woff');
        }

        @font-face {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;
            src: local('â˜º'), url('font2.woff') format('woff');
        }

        .wcdiv {
            position: absolute;
        }

        .wcspan {
            position: absolute;
            white-space: pre;
            color: #000000;
            font-size: 12pt;
        }

        .wcimg {
            position: absolute;
        }

        .wcsvg {
            position: absolute;
        }

        .wcpage {
            position: relative;
            margin: 10pt auto 10pt auto;
            overflow: hidden;
        }

        @media print {
            body {
                margin: 0pt;
                padding: 0pt;

            }

            .wcpage {
                page-break-after: always;
                margin: 0pt;
                padding: 0pt;
            }
        }

        .wctext001 {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;
        }

        .wctext002 {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: bold;
        }
        .wcdiv.border{
            border: 1px solid black !important;
        }
    </style>
</head>

<body>
    <div class="wcdiv wcpage" style="width:419.55pt; height:595.3pt;">
        <div class="wcdiv" style="left:4.2pt; top:14.2pt;">
            <div class="wcdiv" style="top:85.56pt;">
                <div class="wcdiv" style="clip:rect(0pt,227.2pt,16.45pt,0pt);">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">No Nota <span style="font-weight: bold;">{{ $transaksi->no_nota }}</span></span>
                    </div>
                </div>
                <div class="wcdiv" style="left:204.2pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext002"
                            style="font-size:12pt; left:-10pt; top:0pt; line-height:9.77pt;">NOTA TRANSAKSI PENYEWAAN BARANG</span></div>
                </div>
                <div class="wcdiv" style="top:15.45pt;">
                    <div class="wcdiv" style="clip:rect(0pt,227.2pt,16.45pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">Tanggal {{ \Carbon\Carbon::parse($transaksi->tanggal)->isoFormat('DD-MM-YYYY') }}</span></div>
                    </div>
                </div>
            </div>
            <div class="wcdiv" style="top:117.95pt;">
                <div class="wcdiv" style="">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext002"
                            style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">Penyewa</span></div>
                </div>
                <div class="wcdiv" style="left:226.7pt; ">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext002"
                            style="font-size:11pt; left:-30pt; top:0pt; line-height:13.43pt;">Atas Nama</span></div>
                </div>
                <div class="wcdiv" style="top:13.43pt;">
                    <div class="wcdiv" style="clip:rect(0pt,52.5pt,14.43pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">Nama</span></div>
                    </div>
                    <div class="wcdiv" style="left:52.5pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-15pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:69.85pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-20pt; top:0pt; line-height:13.43pt;">{{ $transaksi->pelanggan->pelanggan ?? $penyewa_umum->nama }}</span></div>
                    </div>
                    <div class="wcdiv" style="left:226.7pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-30pt;; top:0pt; line-height:13.43pt;">Nama</span></div>
                    </div>
                    <div class="wcdiv" style="left:289.25pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-52pt;  top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:310.2pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-60pt; top:0pt; line-height:13.43pt;">{{ $transaksi->atasNama->nama }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:26.86pt;">
                    <div class="wcdiv" style="clip:rect(0pt,52.5pt,14.43pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">Alamat</span></div>
                    </div>
                    <div class="wcdiv" style="left:52.5pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-15pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:69.85pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-20pt; top:0pt; line-height:13.43pt;">{{ $transaksi->pelanggan->alamat ?? $penyewa_umum->alamat }}</span></div>
                    </div>
                    <div class="wcdiv" style="left:226.7pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-30pt; top:0pt; line-height:13.43pt;">Alamat</span></div>
                    </div>
                    <div class="wcdiv" style="left:289.25pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-52pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:310.2pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-60pt; top:0pt; line-height:13.43pt;">{{ $transaksi->atasNama->alamat }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:53.71pt;">
                    <div class="wcdiv" style="clip:rect(0pt,52.5pt,14.43pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">Kota</span></div>
                    </div>
                    <div class="wcdiv" style="left:52.5pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-15pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:69.85pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-20pt; top:0pt; line-height:13.43pt;">{{ $transaksi->pelanggan->kota ?? $penyewa_umum->kota }}</span></div>
                    </div>
                    <div class="wcdiv" style="left:226.7pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-30pt; top:0pt; line-height:13.43pt;">Kota</span></div>
                    </div>
                    <div class="wcdiv" style="left:289.25pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-52pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:310.2pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-60pt; top:0pt; line-height:13.43pt;">{{ $transaksi->atasNama->kota }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:67.14pt;">
                    <div class="wcdiv" style="clip:rect(0pt,52.5pt,14.43pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">No. tlp</span></div>
                    </div>
                    <div class="wcdiv" style="left:52.5pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-15pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:69.85pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-20pt; top:0pt; line-height:13.43pt;">{{ $transaksi->pelanggan->no_telpon ?? $penyewa_umum->no_telpon }}</span></div>
                    </div>
                    <div class="wcdiv" style="left:226.7pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-30pt; top:0pt; line-height:13.43pt;">No. tlp</span></div>
                    </div>
                    <div class="wcdiv" style="left:289.25pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-52pt; top:0pt; line-height:13.43pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:310.2pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:11pt; left:-60pt; top:0pt; line-height:13.43pt;">{{ $transaksi->atasNama->no_telpon }}</span></div>
                    </div>
                </div>
            </div>
            <div class="wcdiv" style="left:0.25pt; top:204.01pt;">
                <div class="wcdiv " style="">
                    <div class="wcdiv " style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt; font-weight: bold;">No</span></div>
                </div>
                <div class="wcdiv " style="left:-10pt;">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:120pt; top:0pt; line-height:10.99pt; font-weight: bold;">Tipe Produk</span></div>
                </div>
                <div class="wcdiv" style="left:220pt;">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:4.18pt; top:0pt; line-height:10.99pt; font-weight: bold;">Unit</span></div>
                </div>
                <div class="wcdiv" style="left:245.8pt;">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:6.14pt; top:0pt; line-height:10.99pt; font-weight: bold;">Satuan</span></div>
                </div>
                <div class="wcdiv" style="left:275.1pt;">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:16.77pt; top:0pt; line-height:10.99pt; font-weight: bold;">@(Rp)</span></div>
                </div>
                <div class="wcdiv" style="left:325pt; ">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:6.4pt; top:0pt; line-height:10.99pt; font-weight: bold;">Hr</span></div>
                </div>
                <div class="wcdiv" style="left:350.9pt; ">
                    <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:4.49pt; top:0pt; line-height:10.99pt;  font-weight: bold;">Jumlah(Rp)</span></div>
                </div>

            </div>
            <div class="wcdiv" style="top:210.78pt;"><span class="wcspan wctext001"
                style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">────────────────────────────────────────────────────────────────────────────────────────────────────────────────────</span>
                @include('nota.isi.isi_penyewaan')

            </div>
            <div class="wcdiv" style="top:442.78pt;"><span class="wcspan wctext001"
                    style="font-size:11pt; left:0pt; top:0pt; line-height:13.43pt;">──────────────────────────────────────────────────────────────────────────</span>
            </div>
            <div class="wcdiv" style="top:452.27pt;">
                <div class="wcdiv" style="clip:rect(0pt,63.5pt,11.99pt,0pt);">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Dikrim Hari</span></div>
                </div>
                <div class="wcdiv" style="left:63.5pt; ">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:-16pt; top:0pt; line-height:10.99pt;">=</span></div>
                </div>
                <div class="wcdiv" style="left:78.8pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:-22pt; top:0pt; line-height:10.99pt;">{{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('dddd') }}</span></div>
                </div>
                <div class="wcdiv" style="left:114.2pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:-32pt; top:0pt; line-height:10.99pt;">Tgl {{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('DD-MM-YYYY') }}</span></div>
                </div>
                <div class="wcdiv" style="left:185.4pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Total Tarif Sewa</span>
                    </div>
                </div>
                <div class="wcdiv" style="left:279.95pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                </div>
                <div class="wcdiv" style="left:312.4pt;">
                    <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                            style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($total_biaya_sewa) }}</span></div>
                </div>
                <div class="wcdiv" style="top:10.99pt;">
                    <div class="wcdiv" style="clip:rect(0pt,63.5pt,11.99pt,0pt);">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; top:0pt; line-height:10.99pt;">Ambil Hari</span></div>
                    </div>
                    <div class="wcdiv" style="left:63.5pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:-16pt; top:0pt; line-height:10.99pt;">=</span></div>
                    </div>
                    <div class="wcdiv" style="left:78.8pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:-22pt; top:0pt; line-height:10.99pt;">{{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('dddd') }}</span></div>
                    </div>
                    <div class="wcdiv" style="left:114.2pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:-32pt; top:0pt; line-height:10.99pt;">Tgl {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('DD-MM-YYYY') }}</span>
                        </div>
                    </div>
                    <div class="wcdiv" style="left:185.4pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Diskon</span></div>
                    </div>
                    <div class="wcdiv" style="left:279.95pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                    </div>
                    <div class="wcdiv" style="left:312.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ $transaksi->diskon ?? 0.0 }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:21.97pt;">
                    <div class="wcdiv" style="left:185.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Jumlah</span></div>
                    </div>
                    <div class="wcdiv" style="left:279.95pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                    </div>
                    <div class="wcdiv" style="left:312.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($total_biaya_sewa) }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:32.96pt;">
                    <div class="wcdiv" style="">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:40pt; top:0pt; line-height:10.99pt;">TTD Penyewa</span>
                        </div>
                        <div  class="wcdiv" style="left:40pt; top:35pt; width: 60pt; border-top: 1px solid black;"></div>
                    </div>
                    <div class="wcdiv" style="left:114.2pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:40pt; top:0pt; line-height:10.99pt;">TTD Pengirim</span>
                        </div>
                        <div  class="wcdiv" style="left:40pt; top:35pt; width: 60pt; border-top: 1px solid black;"></div>
                    </div>
                    <div class="wcdiv" style="left:185.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Biaya Kirim &amp;Ambil</span></div>
                    </div>
                    <div class="wcdiv" style="left:279.95pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                    </div>
                    <div class="wcdiv" style="left:312.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($transaksi->biaya_kirim_ambil)}}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:43.94pt;">
                    <div class="wcdiv" style="left:185.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Uang Muka</span></div>
                    </div>
                    <div class="wcdiv" style="left:279.95pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                    </div>
                    <div class="wcdiv" style="left:312.4pt; ">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($transaksi->uang_muka) }}</span></div>
                    </div>
                </div>
                <div class="wcdiv" style="top:54.93pt;">
                    <div class="wcdiv" style="left:185.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:60pt; top:0pt; line-height:10.99pt;">Sisa</span></div>
                    </div>
                    <div class="wcdiv" style="left:279.95pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; left:50pt; top:0pt; line-height:10.99pt;">=RP</span></div>
                    </div>
                    <div class="wcdiv" style="left:312.4pt;">
                        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001"
                                style="font-size:9pt; right:-87pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($total_biaya_sewa - $transaksi->diskon  + $transaksi->biaya_kirim_ambil - $transaksi->uang_muka) }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wcdiv" style="left:14.2pt; top:14.2pt;"><img class="wcimg"
                style="left: 0pt; top: 0pt; width: 391.15pt; height: 76.1pt;"
                src="{{ asset("nota_template/header nota-1500w.png") }}"
                width="391.15pt" height="76.1pt">
                <div  class="wcdiv" style="left:0; top:80pt; width: 400pt; border-top: 2px solid black;"></div>
 </div>
        <div class="wcdiv" style="left:14.2pt; top:543.37pt;"><img class="wcimg"
                style="left: 0pt; top: 0pt; width: 391.15pt; height: 26.7pt;"
                src="{{ asset("nota_template/footer nota-200h2.png") }}"
                width="391.15pt" height="26.7pt"></div>
    </div>
    {{-- <script>
        window.print();
    </script> --}}
</body>

</html>
