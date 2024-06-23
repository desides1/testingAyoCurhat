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
            'read-dashboard',
            # User permission
            'create-users', 'read-users', 'update-users', 'delete-users',
            # Laporan
            'create-reports', 'read-reports', 'update-reports', 'delete-reports',
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
