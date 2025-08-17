<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResepObatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'catatan_dokter' => 'nullable|string',
            'status_resep' => 'sometimes|in:aktif,digunakan,expired',
            'total_biaya' => 'sometimes|numeric|min:0'
        ];
    }
}