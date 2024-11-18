<?php

namespace Database\Seeders;

use App\Models\VictimRequirement;
use Illuminate\Database\Seeder;

class VictimRequirementSeeder extends Seeder
{
    public function run(): void
    {
        $victimRequirementNames = [
            'Konseling psikologis',
            'Konseling rohani/spiritual',
            'Bantuan hukum',
            'Bantuan medis',
            'Bantuan digital',
            'Tidak membutuhkan pendampingan',
            'Lainnya',
        ];

        foreach ($victimRequirementNames as $name) {
            VictimRequirement::create([
                'name' => $name,
            ]);
        }
    }
}
