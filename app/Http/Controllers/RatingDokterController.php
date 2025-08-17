<?php

namespace App\Http\Controllers;

use App\Models\RatingDokter;
use Illuminate\Http\Request;

class RatingDokterController extends Controller
{
    public function index()
    {
        $ratings = RatingDokter::with(['pasien', 'dokter', 'konsultasi', 'janjiTemu'])->get();
        return response()->json($ratings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
            'is_anonymous' => 'boolean'
        ]);

        $rating = RatingDokter::create($request->all());
        
        // Update rating rata-rata dokter
        $dokter = $rating->dokter;
        $dokter->rating_rata_rata = RatingDokter::where('dokter_id', $dokter->id)->avg('rating');
        $dokter->save();

        return response()->json($rating->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']), 201);
    }

    public function show(RatingDokter $ratingDokter)
    {
        return response()->json($ratingDokter->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']));
    }

    public function update(Request $request, RatingDokter $ratingDokter)
    {
        $request->validate([
            'pasien_id' => 'sometimes|exists:pasien,id',
            'dokter_id' => 'sometimes|exists:dokter,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'rating' => 'sometimes|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
            'is_anonymous' => 'boolean'
        ]);

        $oldRating = $ratingDokter->rating;
        $ratingDokter->update($request->all());
        
        // Update rating rata-rata dokter jika rating berubah
        if ($ratingDokter->rating != $oldRating) {
            $dokter = $ratingDokter->dokter;
            $dokter->rating_rata_rata = RatingDokter::where('dokter_id', $dokter->id)->avg('rating');
            $dokter->save();
        }

        return response()->json($ratingDokter->load(['pasien', 'dokter', 'konsultasi', 'janjiTemu']));
    }

    public function destroy(RatingDokter $ratingDokter)
    {
        $dokter = $ratingDokter->dokter;
        $ratingDokter->delete();
        
        // Update rating rata-rata dokter
        $dokter->rating_rata_rata = RatingDokter::where('dokter_id', $dokter->id)->avg('rating');
        $dokter->save();

        return response()->json(null, 204);
    }
}