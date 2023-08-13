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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->foreignId('tipe_id');
            $table->integer('tarif_sewa');
            $table->integer('lama_sewa');
            $table->integer('komisi_kirim');
            $table->integer('komisi_ambil')->nullable();
            $table->integer('unit_in')->nullable();
            $table->integer('unit_out')->nullable();
            $table->integer('x_komisi');
            $table->foreignId('karyawan_id')->nullable();
            $table->string('bagi_komisi_kirim')->nullable();
            $table->string('bagi_komisi_ambil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
