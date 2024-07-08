<?php

namespace Database\Seeders;

use App\Models\ReportedStatus;
use Illuminate\Database\Seeder;

class ReportedStatusSeeder extends Seeder
{
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
