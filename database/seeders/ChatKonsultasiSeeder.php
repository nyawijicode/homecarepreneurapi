<?php

namespace Database\Seeders;

use App\Models\ChatKonsultasi;
use App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChatKonsultasiSeeder extends Seeder
{
    public function run()
    {
        $konsultasi = Konsultasi::first();
        $pasien = User::where('role', 'pasien')->first();
        $dokter = User::where('role', 'dokter')->first();

        ChatKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $pasien->id,
            'tipe_pesan' => 'text',
            'isi_pesan' => 'Selamat pagi dok, saya sudah demam 3 hari ini',
            'is_read' => true
        ]);

        ChatKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $dokter->id,
            'tipe_pesan' => 'text',
            'isi_pesan' => 'Selamat pagi, apakah ada gejala lain selain demam?',
            'is_read' => true
        ]);

        ChatKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $pasien->id,
            'tipe_pesan' => 'text',
            'isi_pesan' => 'Ada dok, saya juga batuk dan pilek',
            'is_read' => true
        ]);

        ChatKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $pasien->id,
            'tipe_pesan' => 'image',
            'file_path' => 'foto_tenggorokan.jpg',
            'is_read' => true
        ]);

        ChatKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $dokter->id,
            'tipe_pesan' => 'text',
            'isi_pesan' => 'Terima kasih, dari foto dan gejala yang Anda sampaikan, kemungkinan Anda mengalami flu biasa',
            'is_read' => true
        ]);
    }
}