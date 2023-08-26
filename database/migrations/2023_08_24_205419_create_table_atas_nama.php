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
        Schema::create('atas_nama', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->string('nama');
            $table->string('alamat');
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
        Schema::dropIfExists('atas_nama');
    }
};
