<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'konsultasi_id' => $this->konsultasi_id,
            'janji_temu_id' => $this->janji_temu_id,
            'resep_obat_id' => $this->resep_obat_id,
            'nomor_transaksi' => $this->nomor_transaksi,
            'tipe_pembayaran' => $this->tipe_pembayaran,
            'metode_pembayaran' => $this->metode_pembayaran,
            'provider_pembayaran' => $this->provider_pembayaran,
            'jumlah_bayar' => $this->jumlah_bayar,
            'biaya_admin' => $this->biaya_admin,
            'total_bayar' => $this->total_bayar,
            'status_pembayaran' => $this->status_pembayaran,
            'kode_referensi' => $this->kode_referensi,
            'tanggal_bayar' => $this->tanggal_bayar,
            'bukti_pembayaran' => $this->bukti_pembayaran ? asset('storage/' . $this->bukti_pembayaran) : null,
            'catatan' => $this->catatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Relationships
            'user' => $this->whenLoaded('user', new UserResource($this->user)),
            'konsultasi' => $this->whenLoaded('konsultasi', new KonsultasiResource($this->konsultasi)),
            'janji_temu' => $this->whenLoaded('janjiTemu', new JanjiTemuResource($this->janjiTemu)),
            'resep_obat' => $this->whenLoaded('resepObat', new ResepObatResource($this->resepObat)),
        ];
    }
}