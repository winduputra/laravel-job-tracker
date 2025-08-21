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
    Schema::create('lamarans', function (Blueprint $table) {
        $table->id();
        $table->string('posisi');
        $table->string('platform')->default('Other');
        $table->string('url_job');
        $table->string('dokumen');
        $table->text('keterangan')->nullable();
        $table->date('tanggal_lamaran');
        $table->enum('status', ['dikirim', 'wawancara', 'diterima', 'ditolak'])->default('dikirim');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
