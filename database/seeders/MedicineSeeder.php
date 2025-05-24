<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Medicine::updateOrCreate(['nama_obat' => 'Paracetamol', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Amoxicillin', 'satuan' => 'kapsul']);
        Medicine::updateOrCreate(['nama_obat' => 'Ibuprofen', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Cetirizine', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Metformin', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Amlodipine', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Ciprofloxacin', 'satuan' => 'kapsul']);
        Medicine::updateOrCreate(['nama_obat' => 'Omeprazole', 'satuan' => 'kapsul']);
        Medicine::updateOrCreate(['nama_obat' => 'Simvastatin', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Loperamide', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Salbutamol', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Chlorpheniramine', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Mefenamic Acid', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Dexamethasone', 'satuan' => 'tablet']);
        Medicine::updateOrCreate(['nama_obat' => 'Ranitidine', 'satuan' => 'tablet']);
    }
}
