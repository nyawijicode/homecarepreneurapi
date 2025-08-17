<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
    protected $fillable = [
        'konsultasi_id',
        'janji_temu_id',
        'pasien_id',
        'dokter_id',
        'nomor_resep',
        'tanggal_resep',
        'catatan_dokter',
        'status_resep',
        'total_biaya'
    ];

    protected $casts = [
        'tanggal_resep' => 'date',
        'total_biaya' => 'decimal:2',
    ];

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

    // Relasi ke Detail Resep
    public function detailResep()
    {
        return $this->hasMany(DetailResep::class);
    }

    // Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
