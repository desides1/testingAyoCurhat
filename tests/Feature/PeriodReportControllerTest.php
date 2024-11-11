<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeriodReportControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->actingAs(User::factory()->admin()->create());
    }

    public function test_report_without_year_and_month()
    {
        $response = $this->get('/laporan');

        $response->assertStatus(200);

        $response->assertViewHas('caseTypes');
        $response->assertViewHas('years');
    }

    public function test_report_with_valid_year()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2024;

        $response = $this->get("/laporan?year=$year");

        $response->assertStatus(200);

        $response->assertViewHas('caseTypes');
        $response->assertViewHas('year', $year);
    }

    public function test_report_with_valid_year_and_month()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2024;
        $month = 10;

        $response = $this->get("/laporan?year=$year&month=$month");

        $response->assertStatus(200);

        $response->assertViewHas('caseTypes');
        $response->assertViewHas('year', $year);
        $response->assertViewHas('month', $month);
    }

    public function test_report_with_valid_month_and_without_year()
    {
        $this->actingAs(User::factory()->admin()->create());

        $month = 10;

        $response = $this->get("/laporan?month=$month");

        $response->assertStatus(200);

        $response->assertViewHas('caseTypes');
        $response->assertViewHas('month', $month);
    }

    public function test_report_with_invalid_year()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2025;

        $response = $this->get("/laporan?year=$year");

        $response->assertStatus(302);

        $response->assertRedirect(route('report.index'));
    }

    public function test_report_with_invalid_month_less_than_1()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2024;
        $month = 0;

        $response = $this->get("/laporan?year=$year&month=$month");

        $response->assertStatus(302);

        $response->assertRedirect(route('report.index'));
    }

    public function test_report_with_invalid_month_more_than_12()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2024;
        $month = 13;

        $response = $this->get("/laporan?year=$year&month=$month");

        $response->assertStatus(302);

        $response->assertRedirect(route('report.index'));
    }

    public function test_report_with_invalid_year_and_month()
    {
        $this->actingAs(User::factory()->admin()->create());

        $year = 2025;
        $month = 13;

        $response = $this->get("/laporan?year=$year&month=$month");

        $response->assertStatus(302);

        $response->assertRedirect(route('report.index'));
    }
}
