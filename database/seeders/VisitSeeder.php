<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use App\Models\Patient;
use Illuminate\Support\Carbon;

class VisitSeeder extends Seeder
{
    public function run(): void
    {
        $patients = \App\Models\Patient::all();

        foreach ($patients as $patient) {
            Visit::create([
                'patient_id' => $patient->id,
                'tanggal_kunjungan' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
