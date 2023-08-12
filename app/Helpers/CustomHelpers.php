<?php

use Carbon\Carbon;
use Jenssegers\Date\Date;

function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function ambilLokasi($input)
{
    $parts = explode(" ", $input, 2); // Pisahkan string menjadi array dengan batas 2
    $lokasi = $parts[0]; // Ambil bagian pertama dari array
    return $lokasi;
}

function ambilTanggal($input)
{
    $parts = explode(" ", $input);
    // setlocale(LC_TIME, 'id_ID');
    // Ambil bagian tanggal
    $tanggal = $parts[1] . " " . $parts[2] . " " . $parts[3];
    $tanggalCarbon = Date::createFromFormat('d F Y', $tanggal, 'Asia/Jakarta');

    // Konversi nama bulan ke bahasa Inggris
    $tanggalInggris = $tanggalCarbon->format('d F Y');

    // Daftar nama bulan dalam bahasa Indonesia dan Inggris
    $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Konversi nama bulan dari bahasa Indonesia ke bahasa Inggris
    $tanggalInggris = str_replace($bulanIndonesia, $bulanInggris, $tanggalInggris);
    $hasil = Carbon::createFromFormat('d F Y', $tanggalInggris)->format('Y-m-d');;


    return $hasil;
}
