<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with(['user', 'spesialisasi'])->get();
        return response()->json($dokters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nomor_str' => 'required|string|max:50|unique:dokter',
            'nomor_sip' => 'required|string|max:50|unique:dokter',
            'spesialisasi_id' => 'required|exists:spesialisasi,id',
            'pengalaman_tahun' => 'integer|min:0',
            'tarif_konsultasi' => 'required|numeric|min:0',
            'deskripsi_singkat' => 'nullable|string',
            'jadwal_praktek' => 'nullable|json',
            'status_verifikasi' => 'in:pending,verified,rejected'
        ]);

        $dokter = Dokter::create($request->all());
        return response()->json($dokter->load(['user', 'spesialisasi']), 201);
    }

    public function show(Dokter $dokter)
    {
        return response()->json($dokter->load(['user', 'spesialisasi']));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'nomor_str' => 'sometimes|string|max:50|unique:dokter,nomor_str,'.$dokter->id,
            'nomor_sip' => 'sometimes|string|max:50|unique:dokter,nomor_sip,'.$dokter->id,
            'spesialisasi_id' => 'sometimes|exists:spesialisasi,id',
            'pengalaman_tahun' => 'integer|min:0',
            'tarif_konsultasi' => 'sometimes|numeric|min:0',
            'deskripsi_singkat' => 'nullable|string',
            'jadwal_praktek' => 'nullable|json',
            'status_verifikasi' => 'in:pending,verified,rejected'
        ]);

        $dokter->update($request->all());
        return response()->json($dokter->load(['user', 'spesialisasi']));
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return response()->json(null, 204);
    }
}