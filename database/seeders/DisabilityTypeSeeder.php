<?php

namespace Database\Seeders;

use App\Models\DisabilityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisabilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disabilityTypeNames = [
            'Tuna netra',
            'Tuna rungu',
            'Tuna wicara',
            'Lumpuh',
            'Lainnya',
        ];

        foreach ($disabilityTypeNames as $name) {
            DisabilityType::create([
                'name' => $name,
            ]);
        }
    }
}
