<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $petugasRole = Role::create([
            'name' => 'Petugas',
            'guard_name' => 'web'
        ]);

        $tamuSatgasRole = Role::create([
            'name' => 'Tamu Satgas',
            'guard_name' => 'web'
        ]);

        $adminRole->givePermissionTo(
            'dashboard_access',
        );

        $tamuSatgasRole->givePermissionTo(
            'dashboard_access',
            'emergency_call_access',
        );
    }
}
