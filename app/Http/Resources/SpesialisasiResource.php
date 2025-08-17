<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpesialisasiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_spesialisasi' => $this->nama_spesialisasi,
            'deskripsi' => $this->deskripsi,
            'icon' => $this->icon ? asset('storage/' . $this->icon) : null,
            'status_aktif' => $this->status_aktif,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'dokter' => $this->whenLoaded('dokter', DokterResource::collection($this->dokter)),
        ];
    }
}