<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
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
