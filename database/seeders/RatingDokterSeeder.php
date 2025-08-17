<?php

namespace Database\Seeders;

use App\Models\RatingDokter;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Konsultasi;
use App\Models\JanjiTemu;
use Illuminate\Database\Seeder;

class RatingDokterSeeder extends Seeder
{
    public function run()
    {
        $pasien = Pasien::first();
        $dokter = Dokter::first();
        $konsultasi = Konsultasi::first();

        RatingDokter::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'konsultasi_id' => $konsultasi->id,
            'rating' => 4,
            'ulasan' => 'Dokter sangat ramah dan penjelasannya jelas',
            'is_anonymous' => false
        ]);

        $janjiTemu = JanjiTemu::first();

        RatingDokter::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'janji_temu_id' => $janjiTemu->id,
            'rating' => 5,
            'ulasan' => 'Pelayanan sangat memuaskan',
            'is_anonymous' => true
        ]);
    }
}