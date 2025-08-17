<?php

namespace Database\Seeders;

use App\Models\RiwayatMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Konsultasi;
use App\Models\JanjiTemu;
use Illuminate\Database\Seeder;

class RiwayatMedisSeeder extends Seeder
{
    public function run()
    {
        $pasien = Pasien::first();
        $dokter = Dokter::first();
        $konsultasi = Konsultasi::first();

        RiwayatMedis::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'konsultasi_id' => $konsultasi->id,
            'tanggal_pemeriksaan' => now()->subDays(2),
            'keluhan_utama' => 'Demam tinggi selama 3 hari',
            'anamnesis' => 'Pasien mengeluh demam disertai batuk dan pilek',
            'pemeriksaan_fisik' => 'TD: 120/80, Nadi: 80x/menit, Suhu: 38.5°C',
            'diagnosis_utama' => 'Flu biasa',
            'diagnosis_sekunder' => 'Faringitis akut',
            'tindakan' => 'Pemberian obat simptomatik',
            'catatan_dokter' => 'Istirahat cukup dan banyak minum air putih',
            'file_pendukung' => json_encode(['lab1.pdf', 'rontgen1.jpg'])
        ]);

        $janjiTemu = JanjiTemu::first();

        RiwayatMedis::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
            'janji_temu_id' => $janjiTemu->id,
            'tanggal_pemeriksaan' => now()->subDays(1),
            'keluhan_utama' => 'Kontrol tekanan darah',
            'pemeriksaan_fisik' => 'TD: 130/85, Nadi: 75x/menit, Suhu: 36.8°C',
            'diagnosis_utama' => 'Tekanan darah normal',
            'tindakan' => 'Pemeriksaan rutin',
            'catatan_dokter' => 'Tetap jaga pola makan dan olahraga teratur'
        ]);
    }
}