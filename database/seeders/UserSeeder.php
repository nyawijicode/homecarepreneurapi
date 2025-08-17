<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'nama_lengkap' => 'Admin Sistem',
            'email' => 'admin@klinik.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status_aktif' => true
        ]);

        // Dokter
        $dokters = [
            [
                'nama_lengkap' => 'Dr. Ahmad Santoso',
                'email' => 'ahmad@klinik.com',
                'username' => 'drahmas',
                'password' => Hash::make('password'),
                'nomor_telepon' => '081234567891',
                'tanggal_lahir' => '1980-05-15',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Dokter Sudiro No. 15, Jakarta',
                'role' => 'dokter',
                'status_aktif' => true
            ],
            [
                'nama_lengkap' => 'Dr. Siti Rahayu',
                'email' => 'siti@klinik.com',
                'username' => 'drsiti',
                'password' => Hash::make('password'),
                'nomor_telepon' => '081234567892',
                'tanggal_lahir' => '1985-08-20',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Kesehatan No. 22, Jakarta',
                'role' => 'dokter',
                'status_aktif' => true
            ],
        ];

        foreach ($dokters as $dokter) {
            User::create($dokter);
        }

        // Pasien
        $pasiens = [
            [
                'nama_lengkap' => 'Budi Pratama',
                'email' => 'budi@mail.com',
                'username' => 'budi',
                'password' => Hash::make('password'),
                'nomor_telepon' => '081234567893',
                'tanggal_lahir' => '1990-01-10',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Pasien No. 1, Jakarta',
                'role' => 'pasien',
                'status_aktif' => true
            ],
            [
                'nama_lengkap' => 'Ani Lestari',
                'email' => 'ani@mail.com',
                'username' => 'ani',
                'password' => Hash::make('password'),
                'nomor_telepon' => '081234567894',
                'tanggal_lahir' => '1992-03-25',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Sehat No. 5, Jakarta',
                'role' => 'pasien',
                'status_aktif' => true
            ],
        ];

        foreach ($pasiens as $pasien) {
            User::create($pasien);
        }
    }
}