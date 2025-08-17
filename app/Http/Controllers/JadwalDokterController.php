<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwalDokters = JadwalDokter::with('dokter')->get();
        return response()->json($jadwalDokters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'kuota_pasien' => 'integer|min:1',
            'status_aktif' => 'boolean'
        ]);

        $jadwalDokter = JadwalDokter::create($request->all());
        return response()->json($jadwalDokter->load('dokter'), 201);
    }

    public function show(JadwalDokter $jadwalDokter)
    {
        return response()->json($jadwalDokter->load('dokter'));
    }

    public function update(Request $request, JadwalDokter $jadwalDokter)
    {
        $request->validate([
            'dokter_id' => 'sometimes|exists:dokter,id',
            'hari' => 'sometimes|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'waktu_mulai' => 'sometimes|date_format:H:i',
            'waktu_selesai' => 'sometimes|date_format:H:i|after:waktu_mulai',
            'kuota_pasien' => 'integer|min:1',
            'status_aktif' => 'boolean'
        ]);

        $jadwalDokter->update($request->all());
        return response()->json($jadwalDokter->load('dokter'));
    }

    public function destroy(JadwalDokter $jadwalDokter)
    {
        $jadwalDokter->delete();
        return response()->json(null, 204);
    }
}