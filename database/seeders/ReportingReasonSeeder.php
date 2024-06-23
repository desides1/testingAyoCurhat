<?php

namespace Database\Seeders;

use App\Models\ReportingReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportingReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportingReasonNames = [
            'Saya seorang saksi yang khawatir dengan keadaan korban',
            'Saya seorang korban yang memerlukan bantuan pemulihan',
            'Saya ingin perguruan tinggi menindak tegas terlapor',
            'Saya ingin Satgas (Satuan Tugas) mendokumentasikan kejadiannya, meningkatkan keamanan perguruan tinggi dari kekerasan seksual dan/atau perundungan, serta memberi perlindungan bagi saya',
            'Lainnya',
        ];

        foreach ($reportingReasonNames as $name) {
            ReportingReason::create([
                'name' => $name,
            ]);
        }
    }
}
