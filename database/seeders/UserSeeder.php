<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Pendaftaran
        $pendaftaran = User::updateOrCreate(
            ['email' => 'pendaftaran@example.com'],
            [
                'name' => 'Pendaftaran Klinik',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Petugas Pendaftaran',
                'role' => 'pendaftaran',
            ]
        );
        $pendaftaran->assignRole('pendaftaran');

        // Dokter
        $dokter = User::updateOrCreate(
            ['email' => 'dokter@example.com'],
            [
                'name' => 'Dr. John',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Dr. John Doe',
                'role' => 'dokter',
            ]
        );
        $dokter->assignRole('dokter');

        // Perawat
        $perawat = User::updateOrCreate(
            ['email' => 'perawat@example.com'],
            [
                'name' => 'Perawat Lisa',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Lisa',
                'role' => 'perawat',
            ]
        );
        $perawat->assignRole('perawat');

        // Apoteker
        $apoteker = User::updateOrCreate(
            ['email' => 'apoteker@example.com'],
            [
                'name' => 'Apoteker Rina',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Rina',
                'role' => 'apoteker',
            ]
        );
        $apoteker->assignRole('apoteker');
    }
}
