<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $obats = [
            [
                'nama_obat' => 'Paracetamol',
                'nama_generik' => 'Acetaminophen',
                'kategori_obat' => 'Analgesik',
                'bentuk_sediaan' => 'Tablet',
                'kekuatan' => '500 mg',
                'produsen' => 'Kimia Farma',
                'harga' => 5000,
                'stok' => 100,
                'deskripsi' => 'Obat penurun demam dan pereda nyeri',
                'efek_samping' => 'Mual, ruam kulit',
                'status_aktif' => true
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'nama_generik' => 'Amoxicillin',
                'kategori_obat' => 'Antibiotik',
                'bentuk_sediaan' => 'Kapsul',
                'kekuatan' => '500 mg',
                'produsen' => 'Sanbe Farma',
                'harga' => 15000,
                'stok' => 50,
                'deskripsi' => 'Antibiotik untuk infeksi bakteri',
                'efek_samping' => 'Diare, reaksi alergi',
                'status_aktif' => true
            ],
            [
                'nama_obat' => 'Cetirizine',
                'nama_generik' => 'Cetirizine HCl',
                'kategori_obat' => 'Antihistamin',
                'bentuk_sediaan' => 'Tablet',
                'kekuatan' => '10 mg',
                'produsen' => 'Dexa Medica',
                'harga' => 8000,
                'stok' => 75,
                'deskripsi' => 'Obat alergi dan gatal-gatal',
                'efek_samping' => 'Mengantuk, mulut kering',
                'status_aktif' => true
            ],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}