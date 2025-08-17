<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KonsultasiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pasien_id' => $this->pasien_id,
            'dokter_id' => $this->dokter_id,
            'nomor_konsultasi' => $this->nomor_konsultasi,
            'keluhan_utama' => $this->keluhan_utama,
            'gejala_tambahan' => $this->gejala_tambahan,
            'durasi_keluhan' => $this->durasi_keluhan,
            'foto_pendukung' => $this->foto_pendukung,
            'tipe_konsultasi' => $this->tipe_konsultasi,
            'status_konsultasi' => $this->status_konsultasi,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'biaya_konsultasi' => $this->biaya_konsultasi,
            'catatan_dokter' => $this->catatan_dokter,
            'rating' => $this->rating,
            'ulasan' => $this->ulasan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'pasien' => $this->whenLoaded('pasien', new PasienResource($this->pasien)),
            'dokter' => $this->whenLoaded('dokter', new DokterResource($this->dokter)),
            'chat_konsultasi' => $this->whenLoaded('chatKonsultasi', ChatKonsultasiResource::collection($this->chatKonsultasi)),
            'resep_obat' => $this->whenLoaded('resepObat', new ResepObatResource($this->resepObat)),
        ];
    }
}