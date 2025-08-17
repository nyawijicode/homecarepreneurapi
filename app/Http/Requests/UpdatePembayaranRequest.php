<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'resep_obat_id' => 'nullable|exists:resep_obat,id',
            'tipe_pembayaran' => 'sometimes|in:konsultasi,janji_temu,obat',
            'metode_pembayaran' => 'sometimes|in:transfer_bank,e_wallet,kartu_kredit,virtual_account',
            'provider_pembayaran' => 'sometimes|string|max:50',
            'jumlah_bayar' => 'sometimes|numeric|min:0',
            'biaya_admin' => 'sometimes|numeric|min:0',
            'total_bayar' => 'sometimes|numeric|min:0',
            'status_pembayaran' => 'sometimes|in:pending,berhasil,gagal,expired',
            'kode_referensi' => 'nullable|string|max:100',
            'tanggal_bayar' => 'nullable|date',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'catatan' => 'nullable|string'
        ];
    }
}