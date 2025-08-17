<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::with(['pasien', 'dokter'])->get();
        return response()->json($konsultasis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'keluhan_utama' => 'required|string',
            'gejala_tambahan' => 'nullable|string',
            'durasi_keluhan' => 'nullable|string|max:100',
            'foto_pendukung' => 'nullable|json',
            'tipe_konsultasi' => 'required|in:chat,video_call',
            'status_konsultasi' => 'in:menunggu,berlangsung,selesai,dibatalkan',
            'waktu_mulai' => 'nullable|date',
            'waktu_selesai' => 'nullable|date|after:waktu_mulai',
            'biaya_konsultasi' => 'required|numeric|min:0',
            'catatan_dokter' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'ulasan' => 'nullable|string'
        ]);

        $nomorKonsultasi = 'KON-' . date('Ymd') . '-' . str_pad(Konsultasi::count() + 1, 3, '0', STR_PAD_LEFT);

        $konsultasi = Konsultasi::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'nomor_konsultasi' => $nomorKonsultasi,
            'keluhan_utama' => $request->keluhan_utama,
            'gejala_tambahan' => $request->gejala_tambahan,
            'durasi_keluhan' => $request->durasi_keluhan,
            'foto_pendukung' => $request->foto_pendukung,
            'tipe_konsultasi' => $request->tipe_konsultasi,
            'status_konsultasi' => $request->status_konsultasi ?? 'menunggu',
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'biaya_konsultasi' => $request->biaya_konsultasi,
            'catatan_dokter' => $request->catatan_dokter,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return response()->json($konsultasi->load(['pasien', 'dokter']), 201);
    }

    public function show(Konsultasi $konsultasi)
    {
        return response()->json($konsultasi->load(['pasien', 'dokter', 'chatKonsultasi', 'resepObat']));
    }

    public function update(Request $request, Konsultasi $konsultasi)
    {
        $request->validate([
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'keluhan_utama' => 'sometimes|string',
            'gejala_tambahan' => 'nullable|string',
            'durasi_keluhan' => 'nullable|string|max:100',
            'foto_pendukung' => 'nullable|json',
            'tipe_konsultasi' => 'sometimes|in:chat,video_call',
            'status_konsultasi' => 'in:menunggu,berlangsung,selesai,dibatalkan',
            'waktu_mulai' => 'nullable|date',
            'waktu_selesai' => 'nullable|date|after:waktu_mulai',
            'biaya_konsultasi' => 'sometimes|numeric|min:0',
            'catatan_dokter' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'ulasan' => 'nullable|string'
        ]);

        $konsultasi->update($request->all());
        return response()->json($konsultasi->load(['pasien', 'dokter']));
    }

    public function destroy(Konsultasi $konsultasi)
    {
        $konsultasi->delete();
        return response()->json(null, 204);
    }
}