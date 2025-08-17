<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDokterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id|unique:dokter',
            'nomor_str' => 'required|string|max:50|unique:dokter',
            'nomor_sip' => 'required|string|max:50|unique:dokter',
            'spesialisasi_id' => 'required|exists:spesialisasi,id',
            'pengalaman_tahun' => 'sometimes|integer|min:0',
            'tarif_konsultasi' => 'required|numeric|min:0',
            'deskripsi_singkat' => 'nullable|string',
            'jadwal_praktek' => 'nullable|json',
            'status_verifikasi' => 'sometimes|in:pending,verified,rejected'
        ];
    }
}