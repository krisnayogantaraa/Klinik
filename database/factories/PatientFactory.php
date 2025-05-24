<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2010-01-01'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'no_hp' => $this->faker->phoneNumber(),
        ];
    }
}
