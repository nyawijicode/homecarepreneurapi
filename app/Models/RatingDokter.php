<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingDokter extends Model
{
    use HasFactory;
    protected $table = 'rating_dokter';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'konsultasi_id',
        'janji_temu_id',
        'rating',
        'ulasan',
        'is_anonymous'
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
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
