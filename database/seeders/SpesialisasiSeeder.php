<?php

namespace Database\Seeders;

use App\Models\Spesialisasi;
use Illuminate\Database\Seeder;

class SpesialisasiSeeder extends Seeder
{
    public function run()
    {
        $spesialisasi = [
            [
                'nama_spesialisasi' => 'Dokter Umum',
                'deskripsi' => 'Spesialisasi dalam pengobatan umum dan pemeriksaan kesehatan dasar',
                'icon' => 'general.svg',
                'status_aktif' => true
            ],
            [
                'nama_spesialisasi' => 'Dokter Gigi',
                'deskripsi' => 'Spesialisasi dalam kesehatan gigi dan mulut',
                'icon' => 'dental.svg',
                'status_aktif' => true
            ],
            [
                'nama_spesialisasi' => 'Dokter Anak',
                'deskripsi' => 'Spesialisasi dalam kesehatan bayi, anak, dan remaja',
                'icon' => 'pediatric.svg',
                'status_aktif' => true
            ],
            [
                'nama_spesialisasi' => 'Dokter Kandungan',
                'deskripsi' => 'Spesialisasi dalam kesehatan reproduksi wanita dan kehamilan',
                'icon' => 'obgyn.svg',
                'status_aktif' => true
            ],
            [
                'nama_spesialisasi' => 'Dokter Jantung',
                'deskripsi' => 'Spesialisasi dalam kesehatan jantung dan pembuluh darah',
                'icon' => 'cardiology.svg',
                'status_aktif' => true
            ],
        ];

        foreach ($spesialisasi as $data) {
            Spesialisasi::create($data);
        }
    }
}