<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use Illuminate\Http\Request;

class DetailResepController extends Controller
{
    public function index()
    {
        $detailReseps = DetailResep::with(['resepObat', 'obat'])->get();
        return response()->json($detailReseps);
    }

    public function store(Request $request)
    {
        $request->validate([
            'resep_obat_id' => 'required|exists:resep_obat,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:20',
            'aturan_pakai' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'harga_satuan' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $detailResep = DetailResep::create($request->all());
        
        // Update total biaya resep
        $resepObat = $detailResep->resepObat;
        $resepObat->total_biaya += $detailResep->subtotal;
        $resepObat->save();

        return response()->json($detailResep->load(['resepObat', 'obat']), 201);
    }

    public function show(DetailResep $detailResep)
    {
        return response()->json($detailResep->load(['resepObat', 'obat']));
    }

    public function update(Request $request, DetailResep $detailResep)
    {
        $request->validate([
            'resep_obat_id' => 'sometimes|exists:resep_obat,id',
            'obat_id' => 'sometimes|exists:obat,id',
            'jumlah' => 'sometimes|integer|min:1',
            'satuan' => 'sometimes|string|max:20',
            'aturan_pakai' => 'sometimes|string|max:255',
            'catatan' => 'nullable|string',
            'harga_satuan' => 'sometimes|numeric|min:0',
            'subtotal' => 'sometimes|numeric|min:0'
        ]);

        $oldSubtotal = $detailResep->subtotal;
        $detailResep->update($request->all());
        
        // Update total biaya resep jika subtotal berubah
        if ($detailResep->subtotal != $oldSubtotal) {
            $resepObat = $detailResep->resepObat;
            $resepObat->total_biaya += ($detailResep->subtotal - $oldSubtotal);
            $resepObat->save();
        }

        return response()->json($detailResep->load(['resepObat', 'obat']));
    }

    public function destroy(DetailResep $detailResep)
    {
        $resepObat = $detailResep->resepObat;
        $resepObat->total_biaya -= $detailResep->subtotal;
        $resepObat->save();

        $detailResep->delete();
        return response()->json(null, 204);
    }
}