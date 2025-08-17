<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;
    protected $table = 'janji_temu';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'nomor_antrian',
        'tanggal_janji',
        'waktu_mulai',
        'waktu_selesai',
        'keluhan',
        'tipe_janji',
        'status_janji',
        'catatan_pasien',
        'catatan_dokter',
        'biaya_konsultasi'
    ];

    protected $casts = [
        'tanggal_janji' => 'date',
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
        'biaya_konsultasi' => 'decimal:2',
    ];

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    // Relasi ke Resep Obat
    public function resepObat()
    {
        return $this->hasOne(ResepObat::class);
    }

    // Relasi ke Riwayat Medis
    public function riwayatMedis()
    {
        return $this->hasOne(RiwayatMedis::class);
    }

    // Relasi ke Rating Dokter
    public function ratingDokter()
    {
        return $this->hasOne(RatingDokter::class);
    }

    // Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
