<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $pasien1 = User::where('email', 'budi@mail.com')->first();
        $pasien2 = User::where('email', 'ani@mail.com')->first();

        $dataPasien = [
            [
                'user_id' => $pasien1->id,
                'nomor_rekam_medis' => 'RM-'.date('Ymd').'-001',
                'golongan_darah' => 'A',
                'rhesus' => '+',
                'tinggi_badan' => 170,
                'berat_badan' => 65.5,
                'alergi' => 'Alergi debu dan udang',
                'riwayat_penyakit' => 'Asma sejak kecil',
                'kontak_darurat_nama' => 'Siti',
                'kontak_darurat_telepon' => '081234567895'
            ],
            [
                'user_id' => $pasien2->id,
                'nomor_rekam_medis' => 'RM-'.date('Ymd').'-002',
                'golongan_darah' => 'B',
                'rhesus' => '-',
                'tinggi_badan' => 160,
                'berat_badan' => 55.2,
                'alergi' => 'Tidak ada',
                'riwayat_penyakit' => 'Tidak ada',
                'kontak_darurat_nama' => 'Budi',
                'kontak_darurat_telepon' => '081234567896'
            ],
        ];

        foreach ($dataPasien as $pasien) {
            Pasien::create($pasien);
        }
    }
}