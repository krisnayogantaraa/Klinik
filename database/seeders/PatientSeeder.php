<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::insert([
            [
                'nama' => 'Ahmad Ramadhan',
                'tanggal_lahir' => '1990-01-15',
                'jenis_kelamin' => 'L',
                'no_hp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'tanggal_lahir' => '1985-04-10',
                'jenis_kelamin' => 'P',
                'no_hp' => '089876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambah pasien lainnya sesuai kebutuhan
        ]);
    }
}
