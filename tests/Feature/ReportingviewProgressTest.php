<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\CaseTypeSeeder;
use Database\Seeders\ReportedStatusSeeder;
use App\Models\ReportingProgress;
use App\Models\Reporting;
use App\Models\User;
use Tests\TestCase;

class ReportingviewProgressTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
         $this->seed(\Database\Seeders\DatabaseSeeder::class);
          $this->actingAs(User::factory()->tamuSatgas()->create());
        }

    public function testProgressPageIsDisplayed()
    {
        $this->actingAs(User::factory()->tamuSatgas()->create());
        $this->seed(CaseTypeSeeder::class);

        $reporting = Reporting::factory() ->has(ReportingProgress::factory()->count(3), 'reportingProgress')->create();
        $response = $this->get(route('reportings.progress', ['id' => $reporting->id]));

        $response->assertStatus(200);

        $response->assertViewHasAll(['title', 'reporting', 'reportingProgress']);

    }

}
