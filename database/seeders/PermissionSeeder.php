<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            # Dashboard permissions
            'dashboard_access',
            # User permissions
            'create_users',
            'read_users',
            'update_users',
            'update_user_status',
            'update_profile',
            # Reporting permissons
            'create_reportings',
            'read_reportings',
            'read_all_reportings',
            'show_detail_reportings',
            'create_reporting_progress',
            'read_reporting_progress',
            'update_reporting_status',
            # Counseling permissions
            'create_counselings',
            'read_counselings',
            # Emergency call permissons
            'emergency_call_access',
            # Period Report
            'read_period_report',
            'download_period_report',
            # Auth permissions
            'logout',
        ];

        $this->insertPermission($permissions);
    }

    private function insertPermission(array $permissions): void
    {
        $permissions = collect($permissions)->map(fn($permission) => [
            'name' => $permission,
            'guard_name' => 'web',
            'created_at' => Carbon::now()
        ]);

        Permission::insert($permissions->toArray());
    }
}
