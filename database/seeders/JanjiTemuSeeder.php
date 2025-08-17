<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class JanjiTemuSeeder extends Seeder
{
    public function run()
    {
        $pasien = Pasien::first();
        $dokter = Dokter::first();

        JanjiTemu::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'nomor_antrian' => 'ANT-'.date('Ymd').'-001',
            'tanggal_janji' => now()->addDays(3)->toDateString(),
            'waktu_mulai' => '09:00:00',
            'waktu_selesai' => '09:30:00',
            'keluhan' => 'Kontrol tekanan darah dan kesehatan umum',
            'tipe_janji' => 'kontrol',
            'status_janji' => 'terjadwal',
            'biaya_konsultasi' => 150000
        ]);

        $pasien2 = Pasien::find(2);
        $dokter2 = Dokter::find(2);

        JanjiTemu::create([
            'pasien_id' => $pasien2->id,
            'dokter_id' => $dokter2->id,
            'nomor_antrian' => 'ANT-'.date('Ymd').'-002',
            'tanggal_janji' => now()->addDays(5)->toDateString(),
            'waktu_mulai' => '10:00:00',
            'waktu_selesai' => '10:30:00',
            'keluhan' => 'Pemeriksaan gigi rutin dan pembersihan karang',
            'tipe_janji' => 'pemeriksaan',
            'status_janji' => 'terjadwal',
            'biaya_konsultasi' => 200000
        ]);
    }
}