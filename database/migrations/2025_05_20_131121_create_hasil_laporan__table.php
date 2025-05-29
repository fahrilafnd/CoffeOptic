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
        Schema::create('hasil_laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Tanggal penyortiran
            $table->integer('jumlah_biji_buruk'); // Jumlah biji tersortir
            $table->integer('total_berat'); // Berat total dalam gram
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_laporan_');
    }
};
