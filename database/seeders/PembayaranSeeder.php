<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\JanjiTemu;
use App\Models\ResepObat;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('role', 'pasien')->first();
        $konsultasi = Konsultasi::first();
        $janjiTemu = JanjiTemu::first();
        $resepObat = ResepObat::first();

        Pembayaran::create([
            'user_id' => $user->id,
            'konsultasi_id' => $konsultasi->id,
            'nomor_transaksi' => 'TRX-'.date('YmdHis').'-001',
            'tipe_pembayaran' => 'konsultasi',
            'metode_pembayaran' => 'transfer_bank',
            'provider_pembayaran' => 'BCA',
            'jumlah_bayar' => $konsultasi->biaya_konsultasi,
            'biaya_admin' => 2500,
            'total_bayar' => $konsultasi->biaya_konsultasi + 2500,
            'status_pembayaran' => 'berhasil',
            'kode_referensi' => 'BCA-'.rand(100000, 999999),
            'tanggal_bayar' => now()->subDays(1),
            'bukti_pembayaran' => 'bukti1.jpg'
        ]);

        Pembayaran::create([
            'user_id' => $user->id,
            'janji_temu_id' => $janjiTemu->id,
            'nomor_transaksi' => 'TRX-'.date('YmdHis').'-002',
            'tipe_pembayaran' => 'janji_temu',
            'metode_pembayaran' => 'e_wallet',
            'provider_pembayaran' => 'OVO',
            'jumlah_bayar' => $janjiTemu->biaya_konsultasi,
            'biaya_admin' => 2000,
            'total_bayar' => $janjiTemu->biaya_konsultasi + 2000,
            'status_pembayaran' => 'pending',
            'kode_referensi' => 'OVO-'.rand(100000, 999999)
        ]);

        Pembayaran::create([
            'user_id' => $user->id,
            'resep_obat_id' => $resepObat->id,
            'nomor_transaksi' => 'TRX-'.date('YmdHis').'-003',
            'tipe_pembayaran' => 'obat',
            'metode_pembayaran' => 'virtual_account',
            'provider_pembayaran' => 'Mandiri',
            'jumlah_bayar' => $resepObat->total_biaya,
            'biaya_admin' => 3000,
            'total_bayar' => $resepObat->total_biaya + 3000,
            'status_pembayaran' => 'berhasil',
            'kode_referensi' => 'MANDIRI-'.rand(100000, 999999),
            'tanggal_bayar' => now()->subHours(3),
            'bukti_pembayaran' => 'bukti2.jpg'
        ]);
    }
}