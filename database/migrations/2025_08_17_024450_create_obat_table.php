<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat', 255);
            $table->string('nama_generik', 255)->nullable();
            $table->string('kategori_obat', 100);
            $table->string('bentuk_sediaan', 100);
            $table->string('kekuatan', 50)->nullable();
            $table->string('produsen', 255)->nullable();
            $table->decimal('harga', 8, 2);
            $table->integer('stok')->default(0);
            $table->text('deskripsi')->nullable();
            $table->text('efek_samping')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obat');
    }
};