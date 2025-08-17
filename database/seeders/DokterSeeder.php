<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    public function run()
    {
        $dokter1 = User::where('email', 'ahmad@klinik.com')->first();
        $dokter2 = User::where('email', 'siti@klinik.com')->first();

        $dataDokter = [
            [
                'user_id' => $dokter1->id,
                'nomor_str' => 'STR1234567890',
                'nomor_sip' => 'SIP1234567890',
                'spesialisasi_id' => 1, // Dokter Umum
                'pengalaman_tahun' => 10,
                'tarif_konsultasi' => 150000,
                'deskripsi_singkat' => 'Dokter umum berpengalaman dengan spesialisasi pemeriksaan kesehatan menyeluruh',
                'jadwal_praktek' => json_encode([
                    ['hari' => 'senin', 'jam_mulai' => '08:00', 'jam_selesai' => '16:00'],
                    ['hari' => 'rabu', 'jam_mulai' => '08:00', 'jam_selesai' => '16:00'],
                    ['hari' => 'jumat', 'jam_mulai' => '08:00', 'jam_selesai' => '16:00']
                ]),
                'status_verifikasi' => 'verified'
            ],
            [
                'user_id' => $dokter2->id,
                'nomor_str' => 'STR0987654321',
                'nomor_sip' => 'SIP0987654321',
                'spesialisasi_id' => 2, // Dokter Gigi
                'pengalaman_tahun' => 8,
                'tarif_konsultasi' => 200000,
                'deskripsi_singkat' => 'Dokter gigi spesialis perawatan gigi dan mulut',
                'jadwal_praktek' => json_encode([
                    ['hari' => 'selasa', 'jam_mulai' => '09:00', 'jam_selesai' => '17:00'],
                    ['hari' => 'kamis', 'jam_mulai' => '09:00', 'jam_selesai' => '17:00'],
                    ['hari' => 'sabtu', 'jam_mulai' => '09:00', 'jam_selesai' => '14:00']
                ]),
                'status_verifikasi' => 'verified'
            ],
        ];

        foreach ($dataDokter as $dokter) {
            Dokter::create($dokter);
        }
    }
}