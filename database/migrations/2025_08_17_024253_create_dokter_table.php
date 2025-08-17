<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nomor_str', 50)->unique();
            $table->string('nomor_sip', 50)->unique();
            $table->foreignId('spesialisasi_id')->constrained('spesialisasi');
            $table->integer('pengalaman_tahun')->default(0);
            $table->decimal('tarif_konsultasi', 10, 2);
            $table->text('deskripsi_singkat')->nullable();
            $table->json('jadwal_praktek')->nullable();
            $table->decimal('rating_rata_rata', 2, 1)->default(0);
            $table->integer('total_pasien')->default(0);
            $table->enum('status_verifikasi', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokter');
    }
};