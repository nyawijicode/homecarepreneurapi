<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->nullable()->constrained('konsultasi');
            $table->foreignId('janji_temu_id')->nullable()->constrained('janji_temu');
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('dokter_id')->constrained('dokter');
            $table->string('nomor_resep', 50)->unique();
            $table->date('tanggal_resep');
            $table->text('catatan_dokter')->nullable();
            $table->enum('status_resep', ['aktif', 'digunakan', 'expired']);
            $table->decimal('total_biaya', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep_obat');
    }
};