<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('konsultasi_id')->nullable()->constrained('konsultasi');
            $table->foreignId('janji_temu_id')->nullable()->constrained('janji_temu');
            $table->foreignId('resep_obat_id')->nullable()->constrained('resep_obat');
            $table->string('nomor_transaksi', 100)->unique();
            $table->enum('tipe_pembayaran', ['konsultasi', 'janji_temu', 'obat']);
            $table->enum('metode_pembayaran', ['transfer_bank', 'e_wallet', 'kartu_kredit', 'virtual_account']);
            $table->string('provider_pembayaran', 50);
            $table->decimal('jumlah_bayar', 10, 2);
            $table->decimal('biaya_admin', 8, 2)->default(0);
            $table->decimal('total_bayar', 10, 2);
            $table->enum('status_pembayaran', ['pending', 'berhasil', 'gagal', 'expired']);
            $table->string('kode_referensi', 100)->nullable();
            $table->dateTime('tanggal_bayar')->nullable();
            $table->string('bukti_pembayaran', 255)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            $table->index(['nomor_transaksi', 'status_pembayaran']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};