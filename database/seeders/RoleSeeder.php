<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
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
            'read_all_reportings',
            'show_detail_reportings',
            'read_reporting_progress',
            'create_reporting_progress',
            'update_reporting_status',
            'read_counselings',
            'create_counselings',
            'read_users',
            'create_users',
            'update_users',
            'update_user_status',
            'read_period_report',
            'download_period_report',
            'logout',
        );

        $petugasRole->givePermissionTo(
            'dashboard_access',
            'read_all_reportings',
            'show_detail_reportings',
            'read_reporting_progress',
            'create_reporting_progress',
            'update_reporting_status',
            'read_period_report',
            'download_period_report',
            'logout',
        );

        $tamuSatgasRole->givePermissionTo(
            'dashboard_access',
            'emergency_call_access',
            'read_reportings',
            'create_reportings',
            'show_detail_reportings',
            'read_reporting_progress',
            'read_counselings',
            'create_counselings',
            'update_profile',
            'logout',
        );
    }
}
