<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diagnosis::updateOrCreate([
            'visit_id' => 1,
            'dokter_id' => 2,
            'keluhan' => 'Sakit kepala dan demam.',
            'diagnosa' => 'Infeksi saluran pernapasan atas.',
        ]);
    }
}
