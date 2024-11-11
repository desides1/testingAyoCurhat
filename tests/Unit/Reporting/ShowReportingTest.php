<?php

namespace Tests\Unit\Reporting;

use Tests\TestCase;
use App\Models\Reporting;
use App\Models\ReportingReason;
use App\Models\VictimRequirement;
use App\Models\DisabilityType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowReportingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->actingAs(User::factory()->admin()->create());
    }

    public function testReportingDetail()
    {
        $user = User::factory()->tamuSatgas()->create();
        $reporting = Reporting::factory()->create([
            'reporter_id' => $user->id,
        ]);

        $reporting->disabilityType()->attach(DisabilityType::factory()->count(2)->create()->pluck('id'));
        $reporting->reportingReason()->attach(ReportingReason::factory()->count(2)->create()->pluck('id'));
        $reporting->victimRequirement()->attach(VictimRequirement::factory()->count(2)->create()->pluck('id'));

        // Relations
        $reporting = Reporting::with([
            'reportingUser',
            'reportingReason',
            'reportedStatus',
            'disabilityType',
            'victimRequirement',
        ])->find($reporting->id);

        $response = $this->get(route('reportings.show', $reporting->id));

        // Expected Result
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');

        // Make sure relasinya diload dengan benar
        $this->assertTrue($reporting->relationLoaded('reportingUser'));
        $this->assertTrue($reporting->relationLoaded('reportingReason'));
        $this->assertTrue($reporting->relationLoaded('reportedStatus'));
        $this->assertTrue($reporting->relationLoaded('disabilityType'));
        $this->assertTrue($reporting->relationLoaded('victimRequirement'));
    }
}
