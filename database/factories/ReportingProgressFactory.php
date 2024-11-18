<?php

namespace Database\Factories;
use App\Models\Reporting;
use App\Models\ReportingProgress;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportingProgress>
 */
class ReportingProgressFactory extends Factory
{
    // /**
    //  * Define the model's default state.
    //  *
    //  * @return array<string, mixed>
    //  */
    // public function definition(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    protected $model = ReportingProgress::class;

    public function definition()
    {
        return [
            'reporting_id' => Reporting::factory(),  // relasi ke tabel Reporting
            'note' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
