<!DOCTYPE html>
<html lang="en">

<head>
    <title>Excellent Timely Fish</title>
    <meta property="og:title" content="Excellent Timely Fish" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <style data-tag="reset-style-sheet">
        html {
            line-height: 1.15;
        }

        body {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
        }

        p,
        li,
        ul,
        pre,
        div,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        figure,
        blockquote,
        figcaption {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: transparent;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        select {

            text-transform: none;}button,[type="button"],
            [type="reset"],
            [type="submit"] {

                -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,
                [type="reset"]::-moz-focus-inner,
                [type="submit"]::-moz-focus-inner {
                    border-style: none;

                    padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,
                    [type="reset"]:-moz-focus,
                    [type="submit"]:-moz-focus {
                        outline: 1px dotted ButtonText;
                    }

                    a {
                        color: inherit;
                        text-decoration: inherit;
                    }

                    input {
                        padding: 2px 4px;
                    }

                    img {
                        display: block;
                    }

                    html {
                        scroll-behavior: smooth
                    }
    </style>
    <style data-tag="default-style-sheet">
        html {
            font-family: Noto Sans;
            font-size: 16px;
        }

        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: normal;
            line-height: 1.15;
            color: var(--dl-color-theme-neutral-dark);
            background-color: var(--dl-color-theme-neutral-light);

            fill: var(--dl-color-theme-neutral-dark);
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
        data-tag="font" />
    <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
</head>

<body>
    <link rel="stylesheet" href="{{ asset('nota_template/style.css') }}" />
    <div>
        <link href="{{ asset('nota_template/index.css') }}" rel="stylesheet" />
        <div class="home-container">
            <div class="home-main-container">
                <div class="home-header"><img alt="image" src="{{ asset('nota_template/header nota-1500w.png') }}"
                        class="home-main-logo" /></div>
                <div class="home-body">
                    <div class="home-header-body">
                        <div class="home-isi-header"><span class="home-text">No Nota =
                                {{ $transaksi->no_nota }}</span><span class="home-text01">NOTA TRANSAKSI PENYEWAAN
                                BARANG</span></div>
                        <div class="home-isi-header1"><span class="home-text02">Tanggal&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($transaksi->tanggal)->isoFormat('DD-MM-YYYY') }}</span></div>
                        <div class="home-isi-header2"><span class="home-text03">Penyewa</span><span
                                class="home-text04">Atas Nama</span></div>
                        <div class="home-isi-header3">
                            <span class="home-text06" style="margin-left: 0px;">Nama</span>
                                <span class="home-text06" style="margin-left: 0px; width: 0.3cm;"> = </span>
                                <span class="home-text06" style="margin-left: 0px; width: 5.2cm;"> {{ $transaksi->pelanggan->pelanggan ?? $penyewa_umum->nama }} </span>
                                <span class="home-text06" style="text-align: left;">Nama</span>
                                <span class="home-text06" style="margin-left: 0px; width: 0.2cm;"> = </span>
                                <span class="home-text06" style="text-align: left; margin-left: 0.1cm;">{{ $transaksi->atasNama->nama }} </span>
                            </div>
                        <div class="home-isi-header4">
                            <span class="home-text06" style="margin-left: 0px;">Alamat</span>
                                <span class="home-text06" style="margin-left: 0px; width: 0.3cm;"> = </span>
                                <span class="home-text06" style="margin-left: 0px; width: 5.2cm;"> {{ $transaksi->pelanggan->alamat ?? $penyewa_umum->alamat }}  </span>
                                <span class="home-text08" style="font-size: 13px">Alamat </span>
                            <span class="home-text08" style="margin-left: 0px; width: 0.2cm;"> = </span>
                            <span class="home-text08" style="text-align: left; margin-left: 0.1cm;"> {{ $transaksi->atasNama->alamat }} </span>
                            </div>
                        <div class="home-isi-header5"><span class="home-text06" style="margin-left: 0px;">Kota
                                </span>
                                <span class="home-text06" style="margin-left: 0px; width: 0.3cm;"> = </span>
                                <span class="home-text06" style="margin-left: 0px; width: 5.2cm;"> {{ $transaksi->pelanggan->kota ?? $penyewa_umum->kota }}</span>
                                <span class="home-text10">Kota &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span class="home-text10" style="margin-left: 0px; width: 0.2cm;"> = </span>
                                <span class="home-text10" style="text-align: left; margin-left: 0.1cm;">{{ $transaksi->atasNama->kota }} </span>

                            </div>
                        <div class="home-isi-header6"><span class="home-text06" style="margin-left: 0px;">No. tlp
                                 </span>
                                <span class="home-text06" style="margin-left: 0px; width: 0.3cm;"> = </span>
                                <span class="home-text06" style="margin-left: 0px; width: 5.2cm;">{{ $transaksi->pelanggan->no_telpon ?? $penyewa_umum->no_telpon }} </span>
                                <span class="home-text12" style="font-size: 13px">No. tlp&nbsp;</span>
                             <span class="home-text12" style="margin-left: 0px; width: 0.2cm;"> = </span>
                             <span class="home-text12" style="text-align: left; margin-left: 0.1cm"> {{ $transaksi->atasNama->no_telpon }} </span>
                            </div>
                    </div>
                    <div class="home-main-content">
                        <div style="font-size: 13px" class="home-table"><span class="home-text13">No</span><span class="home-text14">Tipe
                                Produk</span><span class="home-text15">Unit</span><span
                                class="home-text16">Satuan</span><span class="home-text17">@ (Rp)</span><span
                                class="home-text18">Hr</span><span class="home-text19">Jumlah (Rp)</span></div>
                        @foreach ($transaksi->detailTransaksi as $dt)
                            <div class="home-isi-produk"><span class="home-text20">{{ $loop->iteration }}</span><span
                                    class="home-text21">{{ $dt->tipe->tipe }}</span><span
                                    class="home-text22">{{ $dt->unit_out }}</span><span
                                    class="home-text23">{{ $dt->tipe->satuan }}</span><span
                                    class="home-text24">{{ formatRupiah($dt->tipe->tarif_sewa) }}</span><span
                                    class="home-text25">{{ $dt->lama_sewa }}</span><span
                                    class="home-text26">{{ formatRupiah($dt->tarif_sewa) }}</span></div>
                        @endforeach
                    </div>
                    <div class="home-footer">
                        <div style="margin-top: 0.2cm;"></div>
                        <div class="home-content">
                            <span class="custom-text1">Dikrim hari </span>
                                <span class="custom-text1"> =
                                    {{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('dddd') }}</span>
                                <span class="home-text28">Tgl. {{ \Carbon\Carbon::parse($transaksi->tanggal_kirim)->locale('id')->isoFormat('DD-MM-YYYY') }}</span><span
                                class="home-text29">Total tarif
                                sewa&nbsp;</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ formatRupiah($total_biaya_sewa) }}</span>
                        </div>
                        <div class="home-content1"><span class="custom-text1">Ambil hari</span>
                                <span class="custom-text1"> = {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('dddd') }}</span>
                                <span
                                class="home-text32">Tgl. {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->locale('id')->isoFormat('DD-MM-YYYY') }}</span>

                                <span class="home-text33">Diskon</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ $transaksi->diskon ?? 0.0 }}</span></div>
                        <div class="home-content"><span class="home-text27">&nbsp;</span><span
                                class="home-text28">&nbsp;</span><span class="home-text29">Jumlah&nbsp;</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ formatRupiah($total_biaya_sewa + $total_komisi_kirim) }}</span>
                        </div>
                        <div class="home-content3"><span class="home-text37">TTD Penyewa</span><span
                                class="home-text38">TTD Pengirim</span><span class="home-text39">Biaya kirim&amp;ambil</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ formatRupiah($transaksi->biaya_kirim_ambil)}}</span></div>
                        <div class="home-content"><span class="home-text27">&nbsp;</span><span
                                class="home-text28">&nbsp;</span><span class="home-text29">Uang Muka&nbsp;</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ formatRupiah($transaksi->uang_muka) }}</span></div>
                        <div class="home-content5">
                            <div class="home-container1"><span class="home-text43">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></div>
                            <div class="home-container2"><span class="home-text44">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div><span
                                class="home-text45">Sisa</span>
                                <span class="home-text50">=RP</span>
                                <span class="home-text30">{{ formatRupiah($total_biaya_sewa + $total_komisi_kirim + $transaksi->biaya_kirim_ambil - $transaksi->uang_muka) }}</span>
                        </div><img alt="image" src="{{ asset('nota_template/footer nota-200h2.png') }}"
                            class="home-image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            // Konfigurasi opsi cetak
            var printOptions = {
                paperWidth: '148mm', // Lebar kertas A5
                paperHeight: '210mm', // Tinggi kertas A5
                scaleFactor: 0.9, // Skala 90%
            };

            // Mencetak halaman dengan opsi yang dikonfigurasi
            window.print(printOptions);
        };
    </script>
</body>

</html>
