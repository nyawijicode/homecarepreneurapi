<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rating_dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('dokter_id')->constrained('dokter');
            $table->foreignId('konsultasi_id')->nullable()->constrained('konsultasi');
            $table->foreignId('janji_temu_id')->nullable()->constrained('janji_temu');
            $table->integer('rating');
            $table->text('ulasan')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rating_dokter');
    }
};