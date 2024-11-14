<?php

namespace Database\Factories;


use App\Models\VictimRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VictimRequirement>
 */
class VictimRequirementFactory extends Factory
{
    protected $model = VictimRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Konseling psikologis',
                'Konseling rohani/spiritual',
                'Bantuan hukum',
                'Bantuan medis',
                'Bantuan digital',
                'Tidak membutuhkan pendampingan',
                'Lainnya',
            ]),
        ];
    }
}
