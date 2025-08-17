<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = [
        'user_id',
        'nomor_str',
        'nomor_sip',
        'spesialisasi_id',
        'pengalaman_tahun',
        'tarif_konsultasi',
        'deskripsi_singkat',
        'jadwal_praktek',
        'rating_rata_rata',
        'total_pasien',
        'status_verifikasi'
    ];

    protected $casts = [
        'jadwal_praktek' => 'array',
        'rating_rata_rata' => 'decimal:2',
        'tarif_konsultasi' => 'decimal:2',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Spesialisasi
    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }

    // Relasi ke Konsultasi
    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }

    // Relasi ke Janji Temu
    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class);
    }

    // Relasi ke Resep Obat
    public function resepObat()
    {
        return $this->hasMany(ResepObat::class);
    }

    // Relasi ke Riwayat Medis
    public function riwayatMedis()
    {
        return $this->hasMany(RiwayatMedis::class);
    }

    // Relasi ke Rating Dokter
    public function ratingDokter()
    {
        return $this->hasMany(RatingDokter::class);
    }

    // Relasi ke Jadwal Dokter
    public function jadwalDokter()
    {
        return $this->hasMany(JadwalDokter::class);
    }
}
