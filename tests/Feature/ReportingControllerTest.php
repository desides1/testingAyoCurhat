<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\ReportingProgress;
use App\Models\Reporting;
use App\Models\User;
use Tests\TestCase;

class ReportingControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $admin = User::factory()->admin()->create();
    }
    /** @test */
    public function tamu_satgas_can_view_reporting_progress()
    {
        // Create a user with 'Tamu Satgas' role
        $user = User::factory()->create([
            'name' => 'Tamu Satgas',
            'role' => 'Tamu Satgas'
        ]);

        // Create a reporting and related progress
        $reporting = Reporting::factory()->create();
        $reportingProgress = ReportingProgress::factory()->create([
            'reporting_id' => $reporting->id,
        ]);

        // Act as the 'Tamu Satgas' user
        $this->actingAs($user);

        // Hit the route to view reporting progress
        $response = $this->get(route('reportings.progress', $reporting->id));

        // Assert the response and view content
        $response->assertStatus(200);
        $response->assertViewIs('reporting.index-progress');
        $response->assertViewHas('reporting');
        $response->assertViewHas('reportingProgress');
    }
}
