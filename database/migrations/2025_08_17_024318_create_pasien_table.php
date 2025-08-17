<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nomor_rekam_medis', 50)->unique();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->enum('rhesus', ['+', '-'])->nullable();
            $table->integer('tinggi_badan')->nullable()->comment('dalam cm');
            $table->decimal('berat_badan', 5, 2)->nullable()->comment('dalam kg');
            $table->text('alergi')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->string('kontak_darurat_nama', 255)->nullable();
            $table->string('kontak_darurat_telepon', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasien');
    }
};