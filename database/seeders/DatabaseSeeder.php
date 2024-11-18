<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CaseTypeSeeder::class,
            ReportedStatusSeeder::class,
            DisabilityTypeSeeder::class,
            ReportingReasonSeeder::class,
            VictimRequirementSeeder::class,
        ]);
    }
}
