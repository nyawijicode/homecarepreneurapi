<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDokterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id|unique:dokter,user_id,'.$this->dokter->id,
            'nomor_str' => 'sometimes|string|max:50|unique:dokter,nomor_str,'.$this->dokter->id,
            'nomor_sip' => 'sometimes|string|max:50|unique:dokter,nomor_sip,'.$this->dokter->id,
            'spesialisasi_id' => 'sometimes|exists:spesialisasi,id',
            'pengalaman_tahun' => 'sometimes|integer|min:0',
            'tarif_konsultasi' => 'sometimes|numeric|min:0',
            'deskripsi_singkat' => 'nullable|string',
            'jadwal_praktek' => 'nullable|json',
            'status_verifikasi' => 'sometimes|in:pending,verified,rejected'
        ];
    }
}