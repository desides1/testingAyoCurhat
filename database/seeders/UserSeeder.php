<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'adm',
            'password' => Hash::make(1234),
        ]);

        $admin->assignRole('Admin');

        $tamuSatgasUsers = [
            [
                'name' => 'zz',
                'password' => Hash::make(1234),
                'gender' => 'perempuan',
                'email' => 'azizaturrohmablt234@gmail.com',
                'phone_number' => '082282560426',
                'complete_address' => 'Dusun Krajan RT.001/RW.001',
            ],
            [
                'name' => 'yy',
                'password' => Hash::make(1234),
                'gender' => 'laki-laki',
                'email' => 'example2@gmail.com',
                'phone_number' => '081234567890',
                'complete_address' => 'Alamat kedua',
            ],
        ];

        foreach ($tamuSatgasUsers as $userData) {
            $user = User::create($userData);
            $user->assignRole('Tamu Satgas');
        }
    }
}
