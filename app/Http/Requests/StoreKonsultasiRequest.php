<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKonsultasiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'keluhan_utama' => 'required|string',
            'gejala_tambahan' => 'nullable|string',
            'durasi_keluhan' => 'nullable|string|max:100',
            'foto_pendukung' => 'nullable|array',
            'foto_pendukung.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'tipe_konsultasi' => 'required|in:chat,video_call',
            'status_konsultasi' => 'sometimes|in:menunggu,berlangsung,selesai,dibatalkan',
            'waktu_mulai' => 'nullable|date',
            'waktu_selesai' => 'nullable|date|after:waktu_mulai',
            'biaya_konsultasi' => 'required|numeric|min:0',
            'catatan_dokter' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'ulasan' => 'nullable|string'
        ];
    }
}