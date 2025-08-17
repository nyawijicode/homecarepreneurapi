<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatKonsultasi extends Model
{
    use HasFactory;
    protected $table = 'chat_konsultasi';
    protected $fillable = [
        'konsultasi_id',
        'pengirim_id',
        'tipe_pesan',
        'isi_pesan',
        'file_path',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    // Relasi ke Konsultasi
    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }

    // Relasi ke User (pengirim)
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }
}
