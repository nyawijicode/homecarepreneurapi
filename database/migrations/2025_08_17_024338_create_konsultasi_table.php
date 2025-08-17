<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('dokter_id')->constrained('dokter');
            $table->string('nomor_konsultasi', 50)->unique();
            $table->text('keluhan_utama');
            $table->text('gejala_tambahan')->nullable();
            $table->string('durasi_keluhan', 100)->nullable();
            $table->json('foto_pendukung')->nullable();
            $table->enum('tipe_konsultasi', ['chat', 'video_call']);
            $table->enum('status_konsultasi', ['menunggu', 'berlangsung', 'selesai', 'dibatalkan']);
            $table->dateTime('waktu_mulai')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->decimal('biaya_konsultasi', 10, 2);
            $table->text('catatan_dokter')->nullable();
            $table->integer('rating')->nullable();
            $table->text('ulasan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konsultasi');
    }
};