<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('user')->get();
        return response()->json($pasiens);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nomor_rekam_medis' => 'required|string|max:50|unique:pasien',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'rhesus' => 'nullable|in:+,-',
            'tinggi_badan' => 'nullable|integer|min:0',
            'berat_badan' => 'nullable|numeric|min:0',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'kontak_darurat_nama' => 'nullable|string|max:255',
            'kontak_darurat_telepon' => 'nullable|string|max:20'
        ]);

        $pasien = Pasien::create($request->all());
        return response()->json($pasien->load('user'), 201);
    }

    public function show(Pasien $pasien)
    {
        return response()->json($pasien->load(['user', 'riwayatMedis']));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'nomor_rekam_medis' => 'sometimes|string|max:50|unique:pasien,nomor_rekam_medis,'.$pasien->id,
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'rhesus' => 'nullable|in:+,-',
            'tinggi_badan' => 'nullable|integer|min:0',
            'berat_badan' => 'nullable|numeric|min:0',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'kontak_darurat_nama' => 'nullable|string|max:255',
            'kontak_darurat_telepon' => 'nullable|string|max:20'
        ]);

        $pasien->update($request->all());
        return response()->json($pasien->load('user'));
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return response()->json(null, 204);
    }
}