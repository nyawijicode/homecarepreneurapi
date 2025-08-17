<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasienRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id|unique:pasien',
            'nomor_rekam_medis' => 'required|string|max:50|unique:pasien',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'rhesus' => 'nullable|in:+, -',
            'tinggi_badan' => 'nullable|integer|min:0|max:300',
            'berat_badan' => 'nullable|numeric|min:0|max:300',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'kontak_darurat_nama' => 'nullable|string|max:255',
            'kontak_darurat_telepon' => 'nullable|string|max:20'
        ];
    }
}