<?php

namespace Database\Factories;

use App\Models\CaseType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseType>
 */
class CaseTypeFactory extends Factory
{
    protected $model = CaseType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Perundungan online (cyber bullying)',
                'Perundungan fisik (physical bullying)',
                'Perundungan sosial (social bullying)',
                'Perundungan verbal (verbal bullying)',
                'Kekerasan Dalam Rumah Tangga (KDRT)',
                'Pelecehan seksual fisik',
                'Pelecehan seksual non fisik',
            ]),
        ];
    }
}
