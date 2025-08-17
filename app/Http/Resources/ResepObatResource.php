<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResepObatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'konsultasi_id' => $this->konsultasi_id,
            'janji_temu_id' => $this->janji_temu_id,
            'pasien_id' => $this->pasien_id,
            'dokter_id' => $this->dokter_id,
            'nomor_resep' => $this->nomor_resep,
            'tanggal_resep' => $this->tanggal_resep,
            'catatan_dokter' => $this->catatan_dokter,
            'status_resep' => $this->status_resep,
            'total_biaya' => $this->total_biaya,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'konsultasi' => $this->whenLoaded('konsultasi', new KonsultasiResource($this->konsultasi)),
            'janji_temu' => $this->whenLoaded('janjiTemu', new JanjiTemuResource($this->janjiTemu)),
            'pasien' => $this->whenLoaded('pasien', new PasienResource($this->pasien)),
            'dokter' => $this->whenLoaded('dokter', new DokterResource($this->dokter)),
            'detail_resep' => $this->whenLoaded('detailResep', DetailResepResource::collection($this->detailResep)),
        ];
    }
}