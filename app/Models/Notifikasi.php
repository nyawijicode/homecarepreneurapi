<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table = 'notifikasi';
    protected $fillable = [
        'user_id',
        'judul',
        'pesan',
        'tipe_notifikasi',
        'data_referensi',
        'is_read'
    ];

    protected $casts = [
        'data_referensi' => 'array',
        'is_read' => 'boolean',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
