<?php

namespace Database\Factories;


use App\Models\DisabilityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DisabilityType>
 */
class DisabilityTypeFactory extends Factory
{
    protected $model = DisabilityType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Tuna netra',
                'Tuna rungu',
                'Tuna wicara',
                'Lumpuh',
                'Lainnya',
            ]),
        ];
    }
}
