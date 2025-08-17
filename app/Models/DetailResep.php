<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    use HasFactory;
    protected $table = 'detail_resep';
    protected $fillable = [
        'resep_obat_id',
        'obat_id',
        'jumlah',
        'satuan',
        'aturan_pakai',
        'catatan',
        'harga_satuan',
        'subtotal'
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relasi ke Resep Obat
    public function resepObat()
    {
        return $this->belongsTo(ResepObat::class);
    }

    // Relasi ke Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
