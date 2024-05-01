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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('jenis_kelamin', 1);
            $table->string('ttl');
            $table->text('alamat');
            $table->string('kota');
            $table->string('no_telpon');
            $table->string('no_hp');
            $table->string('posisi');
            $table->string('status');
            $table->integer('uang_makan');
            $table->integer('uang_harian');
            $table->integer('uang_lembur');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
