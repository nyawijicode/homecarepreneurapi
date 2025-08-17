<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'user_id',
        'konsultasi_id',
        'janji_temu_id',
        'resep_obat_id',
        'nomor_transaksi',
        'tipe_pembayaran',
        'metode_pembayaran',
        'provider_pembayaran',
        'jumlah_bayar',
        'biaya_admin',
        'total_bayar',
        'status_pembayaran',
        'kode_referensi',
        'tanggal_bayar',
        'bukti_pembayaran',
        'catatan'
    ];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
        'jumlah_bayar' => 'decimal:2',
        'biaya_admin' => 'decimal:2',
        'total_bayar' => 'decimal:2',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Konsultasi
    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }

    // Relasi ke Janji Temu
    public function janjiTemu()
    {
        return $this->belongsTo(JanjiTemu::class);
    }

    // Relasi ke Resep Obat
    public function resepObat()
    {
        return $this->belongsTo(ResepObat::class);
    }
}
