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
        Schema::create('detail_paket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id');
             $table->foreignId('tipe_id');
            $table->integer('unit');
            $table->integer('lama_sewa');
            $table->integer('total_tarif_sewa');
            $table->integer('x_kirim');
            $table->integer('total_komisi_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_paket');
    }
};
