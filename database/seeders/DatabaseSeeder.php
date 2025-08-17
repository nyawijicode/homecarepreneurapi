<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SpesialisasiSeeder::class,
            UserSeeder::class,
            DokterSeeder::class,
            PasienSeeder::class,
            ObatSeeder::class,
            KonsultasiSeeder::class,
            JanjiTemuSeeder::class,
            ResepObatSeeder::class,
            DetailResepSeeder::class,
            PembayaranSeeder::class,
            RiwayatMedisSeeder::class,
            RatingDokterSeeder::class,
            NotifikasiSeeder::class,
            JadwalDokterSeeder::class,
            ChatKonsultasiSeeder::class,
        ]);
    }
}