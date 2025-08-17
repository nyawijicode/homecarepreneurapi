<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return response()->json($obats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'nama_generik' => 'nullable|string|max:255',
            'kategori_obat' => 'required|string|max:100',
            'bentuk_sediaan' => 'required|string|max:100',
            'kekuatan' => 'nullable|string|max:50',
            'produsen' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'integer|min:0',
            'deskripsi' => 'nullable|string',
            'efek_samping' => 'nullable|string',
            'status_aktif' => 'boolean'
        ]);

        $obat = Obat::create($request->all());
        return response()->json($obat, 201);
    }

    public function show(Obat $obat)
    {
        return response()->json($obat);
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'sometimes|string|max:255',
            'nama_generik' => 'nullable|string|max:255',
            'kategori_obat' => 'sometimes|string|max:100',
            'bentuk_sediaan' => 'sometimes|string|max:100',
            'kekuatan' => 'nullable|string|max:50',
            'produsen' => 'nullable|string|max:255',
            'harga' => 'sometimes|numeric|min:0',
            'stok' => 'integer|min:0',
            'deskripsi' => 'nullable|string',
            'efek_samping' => 'nullable|string',
            'status_aktif' => 'boolean'
        ]);

        $obat->update($request->all());
        return response()->json($obat);
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return response()->json(null, 204);
    }
}