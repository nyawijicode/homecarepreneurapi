<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotifikasiSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('role', 'pasien')->first();

        Notifikasi::create([
            'user_id' => $user->id,
            'judul' => 'Konsultasi Selesai',
            'pesan' => 'Konsultasi Anda dengan Dr. Ahmad Santoso telah selesai',
            'tipe_notifikasi' => 'konsultasi',
            'data_referensi' => json_encode(['konsultasi_id' => 1]),
            'is_read' => true
        ]);

        Notifikasi::create([
            'user_id' => $user->id,
            'judul' => 'Janji Temu Mendatang',
            'pesan' => 'Anda memiliki janji temu besok pukul 09:00 dengan Dr. Ahmad Santoso',
            'tipe_notifikasi' => 'janji_temu',
            'data_referensi' => json_encode(['janji_temu_id' => 1]),
            'is_read' => false
        ]);

        $admin = User::where('role', 'admin')->first();

        Notifikasi::create([
            'user_id' => $admin->id,
            'judul' => 'Pembayaran Baru',
            'pesan' => 'Terdapat pembayaran baru yang perlu diverifikasi',
            'tipe_notifikasi' => 'pembayaran',
            'data_referensi' => json_encode(['pembayaran_id' => 2]),
            'is_read' => false
        ]);
    }
}