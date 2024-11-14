<?php

namespace Database\Factories;

use App\Models\ReportedStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportedStatus>
 */
class ReportedStatusFactory extends Factory
{
    protected $model = ReportedStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Mahasiswa',
                'Pendidik',
                'Tenaga kependidikan',
                'Warga kampus',
                'Masyarakat umum',
            ]),
        ];
    }
}
