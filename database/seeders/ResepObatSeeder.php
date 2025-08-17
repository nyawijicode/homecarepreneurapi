<?php

namespace Database\Seeders;

use App\Models\ResepObat;
use App\Models\Konsultasi;
use App\Models\JanjiTemu;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class ResepObatSeeder extends Seeder
{
    public function run()
    {
        $konsultasi = Konsultasi::first();
        $pasien = Pasien::first();
        $dokter = Dokter::first();

        ResepObat::create([
            'konsultasi_id' => $konsultasi->id,
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'nomor_resep' => 'RES-'.date('Ymd').'-001',
            'tanggal_resep' => now()->toDateString(),
            'catatan_dokter' => 'Diminum setelah makan, hindari alkohol',
            'status_resep' => 'aktif',
            'total_biaya' => 35000
        ]);

        $janjiTemu = JanjiTemu::first();

        ResepObat::create([
            'janji_temu_id' => $janjiTemu->id,
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'nomor_resep' => 'RES-'.date('Ymd').'-002',
            'tanggal_resep' => now()->toDateString(),
            'status_resep' => 'aktif',
            'total_biaya' => 50000
        ]);
    }
}