<?php

namespace Database\Seeders;

use App\Models\Prescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prescription::create([
            'visit_id' => 1,
            'medicine_id' => 1,
            'jumlah' => 10,
            'aturan_pakai' => '3x sehari setelah makan',
        ]);
    }
}
