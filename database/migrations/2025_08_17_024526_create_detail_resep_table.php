<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resep_obat_id')->constrained('resep_obat');
            $table->foreignId('obat_id')->constrained('obat');
            $table->integer('jumlah');
            $table->string('satuan', 20);
            $table->string('aturan_pakai', 255);
            $table->text('catatan')->nullable();
            $table->decimal('harga_satuan', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_resep');
    }
};