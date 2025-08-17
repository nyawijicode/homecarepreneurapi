<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'nomor_konsultasi',
        'keluhan_utama',
        'gejala_tambahan',
        'durasi_keluhan',
        'foto_pendukung',
        'tipe_konsultasi',
        'status_konsultasi',
        'waktu_mulai',
        'waktu_selesai',
        'biaya_konsultasi',
        'catatan_dokter',
        'rating',
        'ulasan'
    ];

    protected $casts = [
        'foto_pendukung' => 'array',
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

    // Relasi ke Chat Konsultasi
    public function chatKonsultasi()
    {
        return $this->hasMany(ChatKonsultasi::class);
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
