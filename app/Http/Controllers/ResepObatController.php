<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function index()
    {
        $resepObats = ResepObat::with(['konsultasi', 'janjiTemu', 'pasien', 'dokter', 'detailResep'])->get();
        return response()->json($resepObats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'catatan_dokter' => 'nullable|string',
            'status_resep' => 'in:aktif,digunakan,expired',
            'total_biaya' => 'numeric|min:0'
        ]);

        $nomorResep = 'RES-' . date('Ymd') . '-' . str_pad(ResepObat::count() + 1, 3, '0', STR_PAD_LEFT);

        $resepObat = ResepObat::create([
            'konsultasi_id' => $request->konsultasi_id,
            'janji_temu_id' => $request->janji_temu_id,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'nomor_resep' => $nomorResep,
            'tanggal_resep' => now()->toDateString(),
            'catatan_dokter' => $request->catatan_dokter,
            'status_resep' => $request->status_resep ?? 'aktif',
            'total_biaya' => $request->total_biaya ?? 0
        ]);

        return response()->json($resepObat->load(['konsultasi', 'janjiTemu', 'pasien', 'dokter']), 201);
    }

    public function show(ResepObat $resepObat)
    {
        return response()->json($resepObat->load(['konsultasi', 'janjiTemu', 'pasien', 'dokter', 'detailResep']));
    }

    public function update(Request $request, ResepObat $resepObat)
    {
        $request->validate([
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'catatan_dokter' => 'nullable|string',
            'status_resep' => 'in:aktif,digunakan,expired',
            'total_biaya' => 'numeric|min:0'
        ]);

        $resepObat->update($request->all());
        return response()->json($resepObat->load(['konsultasi', 'janjiTemu', 'pasien', 'dokter']));
    }

    public function destroy(ResepObat $resepObat)
    {
        $resepObat->delete();
        return response()->json(null, 204);
    }
}