<?php

namespace Database\Seeders;

use App\Models\DetailResep;
use App\Models\ResepObat;
use App\Models\Obat;
use Illuminate\Database\Seeder;

class DetailResepSeeder extends Seeder
{
    public function run()
    {
        $resep = ResepObat::first();
        $obat1 = Obat::first();
        $obat2 = Obat::find(2);

        DetailResep::create([
            'resep_obat_id' => $resep->id,
            'obat_id' => $obat1->id,
            'jumlah' => 10,
            'satuan' => 'tablet',
            'aturan_pakai' => '3x sehari 1 tablet',
            'harga_satuan' => $obat1->harga,
            'subtotal' => $obat1->harga * 10
        ]);

        DetailResep::create([
            'resep_obat_id' => $resep->id,
            'obat_id' => $obat2->id,
            'jumlah' => 7,
            'satuan' => 'kapsul',
            'aturan_pakai' => '2x sehari 1 kapsul',
            'catatan' => 'Habiskan semua meskipun sudah merasa baikan',
            'harga_satuan' => $obat2->harga,
            'subtotal' => $obat2->harga * 7
        ]);

        $resep2 = ResepObat::find(2);
        $obat3 = Obat::find(3);

        DetailResep::create([
            'resep_obat_id' => $resep2->id,
            'obat_id' => $obat3->id,
            'jumlah' => 5,
            'satuan' => 'tablet',
            'aturan_pakai' => '1x sehari 1 tablet sebelum tidur',
            'harga_satuan' => $obat3->harga,
            'subtotal' => $obat3->harga * 5
        ]);
    }
}