<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJanjiTemuRequest extends FormRequest
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
            'tanggal_janji' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'keluhan' => 'required|string',
            'tipe_janji' => 'required|in:konsultasi,kontrol,pemeriksaan',
            'status_janji' => 'sometimes|in:terjadwal,berlangsung,selesai,dibatalkan',
            'catatan_pasien' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'biaya_konsultasi' => 'required|numeric|min:0'
        ];
    }
}