<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingDokterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pasien_id' => $this->pasien_id,
            'dokter_id' => $this->dokter_id,
            'konsultasi_id' => $this->konsultasi_id,
            'janji_temu_id' => $this->janji_temu_id,
            'rating' => $this->rating,
            'ulasan' => $this->ulasan,
            'is_anonymous' => $this->is_anonymous,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'pasien' => $this->whenLoaded('pasien', new PasienResource($this->pasien)),
            'dokter' => $this->whenLoaded('dokter', new DokterResource($this->dokter)),
            'konsultasi' => $this->whenLoaded('konsultasi', new KonsultasiResource($this->konsultasi)),
            'janji_temu' => $this->whenLoaded('janjiTemu', new JanjiTemuResource($this->janjiTemu)),
        ];
    }
}