<?php

namespace Database\Seeders;

use App\Models\CaseType;
use Illuminate\Database\Seeder;

class CaseTypeSeeder extends Seeder
{
    public function run(): void
    {
        $caseTypeNames = [
            'Perundungan online (cyber bullying)',
            'Perundungan fisik (physical bullying)',
            'Perundungan sosial (social bullying)',
            'Perundungan verbal (verbal bullying)',
            'Kekerasan Dalam Rumah Tangga (KDRT)',
            'Pelecehan seksual fisik',
            'Pelecehan seksual non fisik',
        ];

        foreach ($caseTypeNames as $name) {
            CaseType::create([
                'name' => $name,
            ]);
        }
    }
}
