<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->constrained('konsultasi');
            $table->foreignId('pengirim_id')->constrained('users');
            $table->enum('tipe_pesan', ['text', 'image', 'file']);
            $table->text('isi_pesan')->nullable();
            $table->string('file_path', 255)->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_konsultasi');
    }
};