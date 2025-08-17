<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('spesialisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_spesialisasi', 100);
            $table->text('deskripsi')->nullable();
            $table->string('icon', 255)->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spesialisasi');
    }
};