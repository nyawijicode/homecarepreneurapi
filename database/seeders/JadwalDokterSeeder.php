<?php

namespace Database\Seeders;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class JadwalDokterSeeder extends Seeder
{
    public function run()
    {
        $dokter = Dokter::first();

        $jadwal = [
            ['hari' => 'senin', 'waktu_mulai' => '08:00:00', 'waktu_selesai' => '12:00:00', 'kuota_pasien' => 10],
            ['hari' => 'senin', 'waktu_mulai' => '13:00:00', 'waktu_selesai' => '16:00:00', 'kuota_pasien' => 10],
            ['hari' => 'rabu', 'waktu_mulai' => '08:00:00', 'waktu_selesai' => '12:00:00', 'kuota_pasien' => 10],
            ['hari' => 'jumat', 'waktu_mulai' => '08:00:00', 'waktu_selesai' => '12:00:00', 'kuota_pasien' => 10],
        ];

        foreach ($jadwal as $item) {
            JadwalDokter::create(array_merge($item, ['dokter_id' => $dokter->id]));
        }

        $dokter2 = Dokter::find(2);

        $jadwal2 = [
            ['hari' => 'selasa', 'waktu_mulai' => '09:00:00', 'waktu_selesai' => '12:00:00', 'kuota_pasien' => 8],
            ['hari' => 'selasa', 'waktu_mulai' => '13:00:00', 'waktu_selesai' => '17:00:00', 'kuota_pasien' => 8],
            ['hari' => 'kamis', 'waktu_mulai' => '09:00:00', 'waktu_selesai' => '12:00:00', 'kuota_pasien' => 8],
            ['hari' => 'sabtu', 'waktu_mulai' => '09:00:00', 'waktu_selesai' => '14:00:00', 'kuota_pasien' => 5],
        ];

        foreach ($jadwal2 as $item) {
            JadwalDokter::create(array_merge($item, ['dokter_id' => $dokter2->id]));
        }
    }
}