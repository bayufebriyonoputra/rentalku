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
        Schema::create('tipe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk_id');
            $table->string('barcode')->nullable();
            $table->string('tipe');
            $table->integer('tarif_sewa');
            $table->integer('komisi_kirim');
            $table->integer('komisi_ambil');
            $table->string('satuan');
            $table->string('saldo_awal');
            $table->integer('stock');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe');
    }
};
