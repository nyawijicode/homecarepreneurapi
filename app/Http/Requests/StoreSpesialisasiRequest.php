<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpesialisasiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_spesialisasi' => 'required|string|max:100|unique:spesialisasi',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|image|mimes:svg,png|max:1024',
            'status_aktif' => 'sometimes|boolean'
        ];
    }
}