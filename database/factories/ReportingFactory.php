<?php

namespace Database\Factories;

use App\Models\Reporting;
use App\Models\User;
use App\Models\CaseType;
use App\Models\ReportedStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reporting>
 */
class ReportingFactory extends Factory
{
    protected $model = Reporting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reporter_id' => User::factory(),
            'reporter_as' => $this->faker->randomElement(['saksi', 'korban']),
            'case_type_id' => CaseType::factory(),
            'case_description' => $this->faker->sentence(),
            'chronology' => $this->faker->paragraph(),
            'reported_status_id' => ReportedStatus::factory(),
            'optional_disability_type' => $this->faker->word(),
            'optional_reporting_reason' => $this->faker->sentence(),
            'optional_phone_number' => $this->faker->phoneNumber(),
            'optional_email' => $this->faker->safeEmail(),
            'optional_victim_requirement' => $this->faker->sentence(),
        ];
    }
}
