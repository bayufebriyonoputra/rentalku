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
        Schema::table('atas_nama', function (Blueprint $table) {
            $table->string('no_nota')->change();
            $table->foreign('no_nota')
                ->references('no_nota')->on('transaksis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atas_nama', function (Blueprint $table) {
            $table->dropForeign(['no_nota']);
        });
    }
};
