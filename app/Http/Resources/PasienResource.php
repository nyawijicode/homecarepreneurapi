<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PasienResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nomor_rekam_medis' => $this->nomor_rekam_medis,
            'golongan_darah' => $this->golongan_darah,
            'rhesus' => $this->rhesus,
            'tinggi_badan' => $this->tinggi_badan,
            'berat_badan' => $this->berat_badan,
            'alergi' => $this->alergi,
            'riwayat_penyakit' => $this->riwayat_penyakit,
            'kontak_darurat_nama' => $this->kontak_darurat_nama,
            'kontak_darurat_telepon' => $this->kontak_darurat_telepon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'user' => $this->whenLoaded('user', new UserResource($this->user)),
            'riwayat_medis' => $this->whenLoaded('riwayatMedis', RiwayatMedisResource::collection($this->riwayatMedis)),
        ];
    }
}