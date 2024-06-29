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
            'name' => 'adm',
            'password' => Hash::make(1234),
        ]);

        $tamu_satgas = User::create([
            'name' => 'zz',
            'password' => Hash::make(1234),
            'gender' => 'perempuan',
            'email' => 'azizaturrohmablt234@gmail.com',
            'phone_number' => '082282560426',
            'complete_address' => 'Dusun Krajan RT.001/RW.001',
        ]);

        $admin->assignRole('Admin');
        $tamu_satgas->assignRole('Tamu Satgas');
    }
}
