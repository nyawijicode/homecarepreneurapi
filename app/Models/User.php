<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'username',
        'password',
        'nomor_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'foto_profil',
        'role',
        'status_aktif'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status_aktif' => 'boolean',
    ];

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->hasOne(Dokter::class);
    }

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->hasOne(Pasien::class);
    }

    // Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Relasi ke Notifikasi
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }

    // Relasi ke Chat Konsultasi (sebagai pengirim)
    public function chatKonsultasi()
    {
        return $this->hasMany(ChatKonsultasi::class, 'pengirim_id');
    }
}
