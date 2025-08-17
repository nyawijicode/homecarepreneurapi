<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKonsultasiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'keluhan_utama' => 'sometimes|string',
            'gejala_tambahan' => 'nullable|string',
            'durasi_keluhan' => 'nullable|string|max:100',
            'foto_pendukung' => 'nullable|array',
            'foto_pendukung.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'tipe_konsultasi' => 'sometimes|in:chat,video_call',
            'status_konsultasi' => 'sometimes|in:menunggu,berlangsung,selesai,dibatalkan',
            'waktu_mulai' => 'nullable|date',
            'waktu_selesai' => 'nullable|date|after:waktu_mulai',
            'biaya_konsultasi' => 'sometimes|numeric|min:0',
            'catatan_dokter' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'ulasan' => 'nullable|string'
        ];
    }
}