<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMedis;
use Illuminate\Http\Request;

class RiwayatMedisController extends Controller
{
    public function index()
    {
        $riwayatMedis = RiwayatMedis::with(['pasien', 'dokter', 'konsultasi', 'janjiTemu'])->get();
        return response()->json($riwayatMedis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'tanggal_pemeriksaan' => 'required|date',
            'keluhan_utama' => 'required|string',
            'anamnesis' => 'nullable|string',
            'pemeriksaan_fisik' => 'nullable|string',
            'diagnosis_utama' => 'required|string|max:255',
            'diagnosis_sekunder' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'file_pendukung' => 'nullable|json'
        ]);

        $riwayatMedis = RiwayatMedis::create($request->all());
        return response()->json($riwayatMedis->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']), 201);
    }

    public function show(RiwayatMedis $riwayatMedis)
    {
        return response()->json($riwayatMedis->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']));
    }

    public function update(Request $request, RiwayatMedis $riwayatMedis)
    {
        $request->validate([
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'tanggal_pemeriksaan' => 'sometimes|date',
            'keluhan_utama' => 'sometimes|string',
            'anamnesis' => 'nullable|string',
            'pemeriksaan_fisik' => 'nullable|string',
            'diagnosis_utama' => 'sometimes|string|max:255',
            'diagnosis_sekunder' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'file_pendukung' => 'nullable|json'
        ]);

        $riwayatMedis->update($request->all());
        return response()->json($riwayatMedis->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']));
    }

    public function destroy(RiwayatMedis $riwayatMedis)
    {
        $riwayatMedis->delete();
        return response()->json(null, 204);
    }
}