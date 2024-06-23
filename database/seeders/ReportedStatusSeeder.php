<?php

namespace Database\Seeders;

use App\Models\ReportedStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportedStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportedStatusNames = [
            'Mahasiswa',
            'Pendidik',
            'Tenaga kependidikan',
            'Warga kampus',
            'Masyarakat umum',
        ];

        foreach ($reportedStatusNames as $name) {
            ReportedStatus::create([
                'name' => $name,
            ]);
        }
    }
}
