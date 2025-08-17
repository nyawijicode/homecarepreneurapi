<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('janji_temu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('dokter_id')->constrained('dokter');
            $table->string('nomor_antrian', 50);
            $table->date('tanggal_janji');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('keluhan');
            $table->enum('tipe_janji', ['konsultasi', 'kontrol', 'pemeriksaan']);
            $table->enum('status_janji', ['terjadwal', 'berlangsung', 'selesai', 'dibatalkan']);
            $table->text('catatan_pasien')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->decimal('biaya_konsultasi', 10, 2);
            $table->timestamps();
            
            $table->index(['dokter_id', 'tanggal_janji']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('janji_temu');
    }
};