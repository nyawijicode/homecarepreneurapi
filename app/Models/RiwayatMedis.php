<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMedis extends Model
{
    use HasFactory;
    protected $table = 'riwayat_medis';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'konsultasi_id',
        'janji_temu_id',
        'tanggal_pemeriksaan',
        'keluhan_utama',
        'anamnesis',
        'pemeriksaan_fisik',
        'diagnosis_utama',
        'diagnosis_sekunder',
        'tindakan',
        'catatan_dokter',
        'file_pendukung'
    ];

    protected $casts = [
        'tanggal_pemeriksaan' => 'datetime',
        'file_pendukung' => 'array',
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
}
