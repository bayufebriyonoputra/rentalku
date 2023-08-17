<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gaji_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti');
            $table->foreignId('karyawan_id');
            $table->date('tanggal');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->integer('komisi_karyawan');
            $table->integer('harian');
            $table->integer('sopir');
            $table->integer('lembur');
            $table->integer('uang_makan');
            $table->integer('potongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji_karyawan');
    }
};
