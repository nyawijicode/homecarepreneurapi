<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'username' => $this->username,
            'nomor_telepon' => $this->nomor_telepon,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'foto_profil' => $this->foto_profil ? asset('storage/' . $this->foto_profil) : null,
            'role' => $this->role,
            'status_aktif' => $this->status_aktif,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'dokter' => $this->whenLoaded('dokter', new DokterResource($this->dokter)),
            'pasien' => $this->whenLoaded('pasien', new PasienResource($this->pasien)),
        ];
    }
}