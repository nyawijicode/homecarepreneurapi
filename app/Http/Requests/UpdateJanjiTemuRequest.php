<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJanjiTemuRequest extends FormRequest
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
            'tanggal_janji' => 'sometimes|date|after_or_equal:today',
            'waktu_mulai' => 'sometimes|date_format:H:i',
            'waktu_selesai' => 'sometimes|date_format:H:i|after:waktu_mulai',
            'keluhan' => 'sometimes|string',
            'tipe_janji' => 'sometimes|in:konsultasi,kontrol,pemeriksaan',
            'status_janji' => 'sometimes|in:terjadwal,berlangsung,selesai,dibatalkan',
            'catatan_pasien' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'biaya_konsultasi' => 'sometimes|numeric|min:0'
        ];
    }
}