<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DokterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nomor_str' => $this->nomor_str,
            'nomor_sip' => $this->nomor_sip,
            'spesialisasi_id' => $this->spesialisasi_id,
            'pengalaman_tahun' => $this->pengalaman_tahun,
            'tarif_konsultasi' => $this->tarif_konsultasi,
            'deskripsi_singkat' => $this->deskripsi_singkat,
            'jadwal_praktek' => $this->jadwal_praktek,
            'rating_rata_rata' => $this->rating_rata_rata,
            'total_pasien' => $this->total_pasien,
            'status_verifikasi' => $this->status_verifikasi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'user' => $this->whenLoaded('user', new UserResource($this->user)),
            'spesialisasi' => $this->whenLoaded('spesialisasi', new SpesialisasiResource($this->spesialisasi)),
            'jadwal_dokter' => $this->whenLoaded('jadwalDokter', JadwalDokterResource::collection($this->jadwalDokter)),
        ];
    }
}