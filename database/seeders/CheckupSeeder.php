<?php

namespace Database\Seeders;

use App\Models\Checkup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checkup::updateOrCreate([
            'visit_id' => 1,
            'perawat_id' => 3,
            'berat_badan' => 65.5,
            'tekanan_darah' => '120/80',
        ]);
    }
}
