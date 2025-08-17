<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riwayat_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('dokter_id')->constrained('dokter');
            $table->foreignId('konsultasi_id')->nullable()->constrained('konsultasi');
            $table->foreignId('janji_temu_id')->nullable()->constrained('janji_temu');
            $table->dateTime('tanggal_pemeriksaan');
            $table->text('keluhan_utama');
            $table->text('anamnesis')->nullable();
            $table->text('pemeriksaan_fisik')->nullable();
            $table->string('diagnosis_utama', 255);
            $table->text('diagnosis_sekunder')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->json('file_pendukung')->nullable();
            $table->timestamps();
            
            $table->index(['pasien_id', 'tanggal_pemeriksaan']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_medis');
    }
};