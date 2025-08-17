<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpesialisasiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_spesialisasi' => 'sometimes|string|max:100|unique:spesialisasi,nama_spesialisasi,'.$this->spesialisasi->id,
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|image|mimes:svg,png|max:1024',
            'status_aktif' => 'sometimes|boolean'
        ];
    }
}