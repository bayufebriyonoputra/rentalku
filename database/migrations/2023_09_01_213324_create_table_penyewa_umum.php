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
        Schema::create('penyewa_umum', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->foreign('no_nota')->references('no_nota')->on('transaksis')->onDelete('cascade');
            $table->string('nama');
            $table->text('alamat');
            $table->integer('no_telpon');
            $table->string('kota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewa_umum');
    }
};
