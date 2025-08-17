<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_obat' => 'required|string|max:255|unique:obat',
            'nama_generik' => 'nullable|string|max:255',
            'kategori_obat' => 'required|string|max:100',
            'bentuk_sediaan' => 'required|string|max:100',
            'kekuatan' => 'nullable|string|max:50',
            'produsen' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'sometimes|integer|min:0',
            'deskripsi' => 'nullable|string',
            'efek_samping' => 'nullable|string',
            'status_aktif' => 'sometimes|boolean'
        ];
    }
}