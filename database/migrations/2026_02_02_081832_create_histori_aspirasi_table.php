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
        Schema::create('histori_aspirasi', function (Blueprint $table) {
    $table->id('id_histori');
    $table->foreignId('id_aspirasi')->constrained('aspirasi');
    $table->string('status_baru');
    $table->text('catatan')->nullable();
    $table->date('tanggal');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_aspirasi');
    }
};
