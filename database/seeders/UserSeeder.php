<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'This is Admin',
            'password' => Hash::make(1234),
        ]);

        $tamu_satgas = User::create([
            'name' => 'Ziza',
            'password' => Hash::make(1234),
        ]);

        $admin->assignRole('Admin');
        $tamu_satgas->assignRole('Tamu Satgas');
    }
}
