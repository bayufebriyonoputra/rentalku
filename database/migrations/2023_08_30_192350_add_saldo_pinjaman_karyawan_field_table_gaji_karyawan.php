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
        Schema::table('gaji_karyawan', function (Blueprint $table) {
            $table->integer('pinjaman_karyawan');
            $table->integer('saldo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gaji_karyawan', function (Blueprint $table) {
            $table->dropIfExists('pinjaman_karyawan');
            $table->dropIfExists('saldo');
        });
    }
};
