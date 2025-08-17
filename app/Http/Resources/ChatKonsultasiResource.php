<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatKonsultasiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'konsultasi_id' => $this->konsultasi_id,
            'pengirim_id' => $this->pengirim_id,
            'tipe_pesan' => $this->tipe_pesan,
            'isi_pesan' => $this->isi_pesan,
            'file_path' => $this->file_path ? asset('storage/' . $this->file_path) : null,
            'is_read' => $this->is_read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'konsultasi' => $this->whenLoaded('konsultasi', new KonsultasiResource($this->konsultasi)),
            'pengirim' => $this->whenLoaded('pengirim', new UserResource($this->pengirim)),
        ];
    }
}