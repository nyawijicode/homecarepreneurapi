<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailResepResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'resep_obat_id' => $this->resep_obat_id,
            'obat_id' => $this->obat_id,
            'jumlah' => $this->jumlah,
            'satuan' => $this->satuan,
            'aturan_pakai' => $this->aturan_pakai,
            'catatan' => $this->catatan,
            'harga_satuan' => $this->harga_satuan,
            'subtotal' => $this->subtotal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'resep_obat' => $this->whenLoaded('resepObat', new ResepObatResource($this->resepObat)),
            'obat' => $this->whenLoaded('obat', new ObatResource($this->obat)),
        ];
    }
}