<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $janjiTemus = JanjiTemu::with(['pasien', 'dokter'])->get();
        return response()->json($janjiTemus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_janji' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'keluhan' => 'required|string',
            'tipe_janji' => 'required|in:konsultasi,kontrol,pemeriksaan',
            'status_janji' => 'in:terjadwal,berlangsung,selesai,dibatalkan',
            'catatan_pasien' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'biaya_konsultasi' => 'required|numeric|min:0'
        ]);

        $nomorAntrian = 'ANT-' . date('Ymd') . '-' . str_pad(JanjiTemu::count() + 1, 3, '0', STR_PAD_LEFT);

        $janjiTemu = JanjiTemu::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'nomor_antrian' => $nomorAntrian,
            'tanggal_janji' => $request->tanggal_janji,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'keluhan' => $request->keluhan,
            'tipe_janji' => $request->tipe_janji,
            'status_janji' => $request->status_janji ?? 'terjadwal',
            'catatan_pasien' => $request->catatan_pasien,
            'catatan_dokter' => $request->catatan_dokter,
            'biaya_konsultasi' => $request->biaya_konsultasi
        ]);

        return response()->json($janjiTemu->load(['pasien', 'dokter']), 201);
    }

    public function show(JanjiTemu $janjiTemu)
    {
        return response()->json($janjiTemu->load(['pasien', 'dokter', 'resepObat']));
    }

    public function update(Request $request, JanjiTemu $janjiTemu)
    {
        $request->validate([
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'tanggal_janji' => 'sometimes|date',
            'waktu_mulai' => 'sometimes|date_format:H:i',
            'waktu_selesai' => 'sometimes|date_format:H:i|after:waktu_mulai',
            'keluhan' => 'sometimes|string',
            'tipe_janji' => 'sometimes|in:konsultasi,kontrol,pemeriksaan',
            'status_janji' => 'in:terjadwal,berlangsung,selesai,dibatalkan',
            'catatan_pasien' => 'nullable|string',
            'catatan_dokter' => 'nullable|string',
            'biaya_konsultasi' => 'sometimes|numeric|min:0'
        ]);

        $janjiTemu->update($request->all());
        return response()->json($janjiTemu->load(['pasien', 'dokter']));
    }

    public function destroy(JanjiTemu $janjiTemu)
    {
        $janjiTemu->delete();
        return response()->json(null, 204);
    }
}