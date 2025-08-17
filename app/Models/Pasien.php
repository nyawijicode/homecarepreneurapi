<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'user_id',
        'nomor_rekam_medis',
        'golongan_darah',
        'rhesus',
        'tinggi_badan',
        'berat_badan',
        'alergi',
        'riwayat_penyakit',
        'kontak_darurat_nama',
        'kontak_darurat_telepon'
    ];

    protected $casts = [
        'berat_badan' => 'decimal:2',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
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
}
