<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_obat' => $this->nama_obat,
            'nama_generik' => $this->nama_generik,
            'kategori_obat' => $this->kategori_obat,
            'bentuk_sediaan' => $this->bentuk_sediaan,
            'kekuatan' => $this->kekuatan,
            'produsen' => $this->produsen,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'deskripsi' => $this->deskripsi,
            'efek_samping' => $this->efek_samping,
            'status_aktif' => $this->status_aktif,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}