<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            # Dashboard permissions
            'dashboard_access',
            # User permission
            'read_users',
            'create_users',
            'update_users',
            'update_user_status',
            'delete_users',
            'update_profile',
            # Reporting Permisson
            'create_reportings',
            'read_reportings',
            'read_all_reportings',
            'show_detail_reportings',
            'read_reporting_progress',
            'create_reporting_progress',
            'update_reporting_status',
            # Counseling Permission
            'read_counselings',
            'create_counselings',
            # Emergency Call Permisson
            'emergency_call_access',
            # Auth Permission
            'logout',
        ];

        $this->insertPermission($permissions);
    }

    private function insertPermission(array $permissions): void
    {
        $permissions = collect($permissions)->map(fn ($permission) => [
            'name' => $permission,
            'guard_name' => 'web',
            'created_at' => Carbon::now()
        ]);

        Permission::insert($permissions->toArray());
    }
}
