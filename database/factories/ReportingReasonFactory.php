<?php

namespace Database\Factories;


use App\Models\ReportingReason;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportingReason>
 */
class ReportingReasonFactory extends Factory
{
    protected $model = ReportingReason::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Saya seorang saksi yang khawatir dengan keadaan korban',
                'Saya seorang korban yang memerlukan bantuan pemulihan',
                'Saya ingin perguruan tinggi menindak tegas terlapor',
                'Saya ingin Satgas (Satuan Tugas) mendokumentasikan kejadiannya, meningkatkan keamanan perguruan tinggi dari kekerasan seksual dan/atau perundungan, serta memberi perlindungan bagi saya',
                'Lainnya',
            ]),
        ];
    }
}
