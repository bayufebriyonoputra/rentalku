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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->foreignId('pelanggan_id');
            $table->date('tanggal');
            $table->date('tanggal_kirim');
            $table->date('tanggal_ambil');
            $table->integer('total_sewa')->nullable();
            $table->integer('biaya_kirim_ambil')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('uang_muka')->nullable();
            $table->integer('pelunasan')->nullable();
            $table->integer('total_komisi')->nullable();
            $table->string('status_pengiriman')->nullable();
            $table->string('status_pengambilan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
