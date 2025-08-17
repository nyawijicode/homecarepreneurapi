<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = [
        'nama_obat',
        'nama_generik',
        'kategori_obat',
        'bentuk_sediaan',
        'kekuatan',
        'produsen',
        'harga',
        'stok',
        'deskripsi',
        'efek_samping',
        'status_aktif'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'status_aktif' => 'boolean',
    ];

    // Relasi ke Detail Resep
    public function detailResep()
    {
        return $this->hasMany(DetailResep::class);
    }
}
