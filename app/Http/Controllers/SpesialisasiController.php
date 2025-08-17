<?php

namespace App\Http\Controllers;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class SpesialisasiController extends Controller
{
    public function index()
    {
        $spesialisasi = Spesialisasi::all();
        return response()->json($spesialisasi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_spesialisasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'status_aktif' => 'boolean'
        ]);

        $spesialisasi = Spesialisasi::create($request->all());
        return response()->json($spesialisasi, 201);
    }

    public function show(Spesialisasi $spesialisasi)
    {
        return response()->json($spesialisasi);
    }

    public function update(Request $request, Spesialisasi $spesialisasi)
    {
        $request->validate([
            'nama_spesialisasi' => 'sometimes|string|max:100',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'status_aktif' => 'boolean'
        ]);

        $spesialisasi->update($request->all());
        return response()->json($spesialisasi);
    }

    public function destroy(Spesialisasi $spesialisasi)
    {
        $spesialisasi->delete();
        return response()->json(null, 204);
    }
}