<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JanjiTemuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pasien_id' => $this->pasien_id,
            'dokter_id' => $this->dokter_id,
            'nomor_antrian' => $this->nomor_antrian,
            'tanggal_janji' => $this->tanggal_janji,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'keluhan' => $this->keluhan,
            'tipe_janji' => $this->tipe_janji,
            'status_janji' => $this->status_janji,
            'catatan_pasien' => $this->catatan_pasien,
            'catatan_dokter' => $this->catatan_dokter,
            'biaya_konsultasi' => $this->biaya_konsultasi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'pasien' => $this->whenLoaded('pasien', new PasienResource($this->pasien)),
            'dokter' => $this->whenLoaded('dokter', new DokterResource($this->dokter)),
            'resep_obat' => $this->whenLoaded('resepObat', new ResepObatResource($this->resepObat)),
        ];
    }
}