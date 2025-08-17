<?php

namespace Database\Seeders;

use App\Models\Konsultasi;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class KonsultasiSeeder extends Seeder
{
    public function run()
    {
        $pasien = Pasien::first();
        $dokter = Dokter::first();

        Konsultasi::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'nomor_konsultasi' => 'KON-'.date('Ymd').'-001',
            'keluhan_utama' => 'Demam tinggi selama 3 hari',
            'gejala_tambahan' => 'Batuk, pilek, sakit kepala',
            'durasi_keluhan' => '3 hari',
            'foto_pendukung' => json_encode(['foto1.jpg', 'foto2.jpg']),
            'tipe_konsultasi' => 'chat',
            'status_konsultasi' => 'selesai',
            'waktu_mulai' => now()->subDays(2)->setTime(10, 0),
            'waktu_selesai' => now()->subDays(2)->setTime(10, 30),
            'biaya_konsultasi' => 150000,
            'catatan_dokter' => 'Pasien didiagnosis flu biasa, disarankan istirahat dan minum obat',
            'rating' => 4,
            'ulasan' => 'Dokter sangat ramah dan penjelasannya jelas'
        ]);

        $pasien2 = Pasien::find(2);
        $dokter2 = Dokter::find(2);

        Konsultasi::create([
            'pasien_id' => $pasien2->id,
            'dokter_id' => $dokter2->id,
            'nomor_konsultasi' => 'KON-'.date('Ymd').'-002',
            'keluhan_utama' => 'Sakit gigi bagian belakang',
            'gejala_tambahan' => 'Gusi bengkak, sulit mengunyah',
            'durasi_keluhan' => '2 hari',
            'tipe_konsultasi' => 'video_call',
            'status_konsultasi' => 'berlangsung',
            'waktu_mulai' => now()->addHours(2),
            'biaya_konsultasi' => 200000,
        ]);
    }
}