<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\ReportingProgress;
use App\Models\Reporting;
use App\Models\User;
use Tests\TestCase;

class ReportingProgressTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $admin = User::factory()->admin()->create();
    }

/** @test */
public function lihat_laporan()
{
    $this->actingAs(User::factory()->admin()->create());
    $reporting = Reporting::factory()->create();
    $reportingProgress = ReportingProgress::factory()->create(['reporting_id'=>$reporting->id]);

    $response = $this->get(route('reportings.progress', $reporting->id));

    $response->assertStatus(200);
    $response->assertViewIs('reporting.index-progress');
    $response->assertViewHas('reporting');
    $response->assertViewHas('reportingProgress');
}

/** @test */
public function dapat_menambahkan_progress()
{
    $this->actingAs(User::factory()->admin()->create());
    $reporting = Reporting::factory()->create();

    $response = $this->post(route('reportings.progress.store'), [
        'reporting_id' => $reporting->id,
        'note' => 'This is a progress note',
    ]);

    $response->assertRedirect(route('reportings.progress', $reporting->id));
    $response->assertSessionHas('success', 'Progress berhasil ditambahkan');

    $this->assertDatabaseHas('reporting_progresses', [
        'reporting_id' => $reporting->id,
        'note' => 'This is a progress note',
    ]);
}

}
