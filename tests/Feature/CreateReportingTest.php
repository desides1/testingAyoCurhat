<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\CaseType;
use App\Models\ReportedStatus;
use App\Models\DisabilityType;
use App\Models\ReportingReason;
use App\Models\VictimRequirement;
use App\Models\Reporting;

class CreateReportingTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

    // Cek pengiriman data
    public function testStoreReportingData()
    {
        $tamuSatgas = User::factory()->tamuSatgas()->create();
        $this->actingAs($tamuSatgas);

        $caseType = CaseType::factory()->create();
        $reportedStatus = ReportedStatus::factory()->create();

        $disabilityTypes = DisabilityType::factory()->count(2)->create();
        $reportingReasons = ReportingReason::factory()->count(1)->create();
        $victimRequirements = VictimRequirement::factory()->count(2)->create();

        $data = [
            'reporter_as' => 'saksi', // Ubah ke salah satu nilai default di factory
            'case_type_id' => $caseType->id,
            'case_description' => 'Deskripsi kasus',
            'chronology' => 'Kronologi kejadian',
            'reported_status_id' => $reportedStatus->id,
            'optional_disability_type' => null,
            'optional_reporting_reason' => null,
            'optional_phone_number' => '08123456789',
            'optional_email' => 'user@example.com',
            'optional_victim_requirement' => null,
            'disability_types' => $disabilityTypes->pluck('id')->toArray(),
            'reporting_reasons' => $reportingReasons->pluck('id')->toArray(),
            'victim_requirements' => $victimRequirements->pluck('id')->toArray()
        ];

        $response = $this->post(route('reportings.store'), $data);

        $response->assertRedirect(route('reportings.user'));
        $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');

        $this->assertDatabaseHas('reportings', [
            'reporter_id' => $tamuSatgas->id,
            'reporter_as' => $data['reporter_as'],
            'case_type_id' => $caseType->id,
            'case_description' => $data['case_description'],
            'chronology' => $data['chronology'],
            'reported_status_id' => $reportedStatus->id,
            'optional_phone_number' => $data['optional_phone_number'],
            'optional_email' => $data['optional_email'],
        ]);

        $reporting = Reporting::where('reporter_id', $tamuSatgas->id)->first();
        $this->assertCount(2, $reporting->disabilityType);
        $this->assertCount(1, $reporting->reportingReason);
        $this->assertCount(2, $reporting->victimRequirement);
    }

    // Cek Status pelapor
    public function testStoreReportingDataFailsWhenReporterStatusIsEmpty()
    {
        $tamuSatgas = User::factory()->tamuSatgas()->create();
        $this->actingAs($tamuSatgas);

        $caseType = CaseType::factory()->create();
        $reportedStatus = ReportedStatus::factory()->create();

        $disabilityTypes = DisabilityType::factory()->count(2)->create();
        $reportingReasons = ReportingReason::factory()->count(1)->create();
        $victimRequirements = VictimRequirement::factory()->count(2)->create();

        $data = [
            'reporter_as' => '', // Kosongkan field ini untuk memicu error
            'case_type_id' => $caseType->id,
            'case_description' => 'Deskripsi kasus',
            'chronology' => 'Kronologi kejadian',
            'reported_status_id' => $reportedStatus->id,
            'optional_disability_type' => null,
            'optional_reporting_reason' => null,
            'optional_phone_number' => '08123456789',
            'optional_email' => 'user@example.com',
            'optional_victim_requirement' => null,
            'disability_types' => $disabilityTypes->pluck('id')->toArray(),
            'reporting_reasons' => $reportingReasons->pluck('id')->toArray(),
            'victim_requirements' => $victimRequirements->pluck('id')->toArray()
        ];

        $response = $this->post(route('reportings.store'), $data);

        $response->assertSessionHasErrors([
            'reporter_as' => 'Status pelapor wajib diisi'
        ]);
    }

    // cek field jenis kasus
    public function testStoreReportingDataFailsWhenCaseTypeIsEmpty()
{
    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    $this->withoutMiddleware();

    $reportedStatus = ReportedStatus::factory()->create();

    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => '',
        'case_description' => 'Deskripsi kasus', // Kosongkan field ini untuk memicu error
        'chronology' => 'Kronologi kejadian',
        'reported_status_id' => $reportedStatus->id,
        'optional_phone_number' => '08123456789',
        'optional_email' => 'user@example.com',
    ];

    $response = $this->post(route('reportings.store'), $data);

    $response->assertSessionHasErrors([
        'case_type_id' => 'Jenis kasus wajib dipilih'
    ]);
}

    // Cek field deskripsi
    public function testStoreReportingDataFailsWhenDeskriptionIsEmpty()
    {

    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    $this->withoutMiddleware();
    $caseType = CaseType::factory()->create();
    $reportedStatus = ReportedStatus::factory()->create();

    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => $caseType->id, // Kosongkan field ini untuk memicu error
        'case_description' => '',
        'chronology' => 'Kronologi kejadian',
        'reported_status_id' => $reportedStatus->id,
        'optional_phone_number' => '08123456789',
        'optional_email' => 'user@example.com',
    ];

    $response = $this->post(route('reportings.store'), $data);

    $response->assertSessionHasErrors([
        'case_description' => 'Deskripsi Kasus harus lebih dari 5 karakter'
    ]);
}

    // Cek field cerita singkat
    public function testStoreReportingDataFailsWhenChronologyIsEmpty()
    {

    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    $this->withoutMiddleware();
    $caseType = CaseType::factory()->create();
    $reportedStatus = ReportedStatus::factory()->create();

    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => $caseType->id, // Kosongkan field ini untuk memicu error
        'case_description' => 'Deskripsi kasus',
        'chronology' => $this->faker->sentence(501),
        'reported_status_id' => $reportedStatus->id,
        'optional_phone_number' => '08123456789',
        'optional_email' => 'user@example.com',
    ];

    $response = $this->post(route('reportings.store'), $data);

    $response->assertSessionHasErrors([
        'chronology' => 'Cerita Singkat Peristiwa tidak boleh lebih dari 500 karakter'
    ]);
}
    // Cek field jenis disabilitas
    public function testStoreReportingDataFailsWhenDisability()
    {

    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    $this->withoutMiddleware();
    $caseType = CaseType::factory()->create();
    $disabilityTypes = DisabilityType::factory()->count(2)->create();
    $reportedStatus = ReportedStatus::factory()->create();

    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => $caseType->id, // Kosongkan field ini untuk memicu error
        'case_description' => 'Deskripsi kasus',
        'chronology' => 'Kronologi kejadian',
        'reported_status_id' => $reportedStatus->id,
        'disability_types' => 0,
        'optional_phone_number' => '08123456789',
        'optional_email' => 'user@example.com',
    ];

    $response = $this->post(route('reportings.store'), $data);
    $response->assertRedirect(route('reportings.user'));
    $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');
}
    // Cek field Alasan pengaduan
    public function testStoreReportingDataFailsReason()
    {

  $tamuSatgas = User::factory()->tamuSatgas()->create();
  $this->actingAs($tamuSatgas);

  $caseType = CaseType::factory()->create();
  $disabilityTypes = DisabilityType::factory()->count(2)->create();
  $reportedStatus = ReportedStatus::factory()->create();
  $reportingReasons = ReportingReason::factory()->count(2)->create();
  $victimRequirements = VictimRequirement::factory()->count(2)->create();

  $data = [
      'reporter_as' => 'saksi',
      'case_type_id' => $caseType->id,
      'case_description' => 'Deskripsi kasus',
      'chronology' => 'Kronologi kejadian',
      'reported_status_id' => $reportedStatus->id,
      'optional_disability_type' => $this->faker->sentence(),
      'optional_reporting_reason' => $this->faker->sentence(),
      'optional_phone_number' => '08123456789',
      'optional_email' => 'user@example.com',
      'disability_types' => $disabilityTypes->pluck('id')->toArray(),
      'reporting_reasons' => $reportingReasons->pluck('id')->toArray(),
      'victim_requirements' => $victimRequirements->pluck('id')->toArray()
  ];

  $response = $this->post(route('reportings.store'), $data);

  $response->assertRedirect(route('reportings.user'));
  $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');
  $reporting = Reporting::where('reporter_id', $tamuSatgas->id)->first();

  $this->assertNotNull($reporting);
  $this->assertCount(2, $reporting->victimRequirement);
  $this->assertCount(2, $reporting->reportingReason);
  $this->assertEqualsCanonicalizing(
      $reportingReasons->pluck('id')->toArray(),
      $reporting->reportingReason->pluck('id')->toArray()
  );
    }

public function testStoreReportingDataFailsWhenTelp(){
        $tamuSatgas = User::factory()->tamuSatgas()->create();
        $this->actingAs($tamuSatgas);

        $caseType = CaseType::factory()->create();
        $reportedStatus = ReportedStatus::factory()->create();

        $disabilityTypes = DisabilityType::factory()->count(2)->create();
        $reportingReasons = ReportingReason::factory()->count(4)->create();
        $victimRequirements = VictimRequirement::factory()->count(2)->create();

        $data = [
            'reporter_as' => 'saksi',
            'case_type_id' => $caseType->id,
            'case_description' => 'Deskripsi kasus',
            'chronology' => 'Kronologi kejadian',
            'reported_status_id' => $reportedStatus->id,
            'optional_disability_type' => $this->faker->sentence(),
            'optional_reporting_reason' => $this->faker->sentence(),
            'optional_phone_number' => '',
            'optional_email' => 'desiayuth@gmail.com',
            'optional_victim_requirement' => $this->faker->sentence(),
            'disability_types' => $disabilityTypes->pluck('id')->toArray(),
            'reporting_reasons' => $reportingReasons->pluck('id')->toArray(),
            'victim_requirements' => $victimRequirements->pluck('id')->toArray()
        ];

        $response = $this->post(route('reportings.store'), $data);

        $response->assertRedirect(route('reportings.user'));
        $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');

        $reporting = Reporting::where('reporter_id', $tamuSatgas->id)->first();
        $this->assertCount(2, $reporting->disabilityType);
        $this->assertCount(4, $reporting->reportingReason);
        $this->assertCount(2, $reporting->victimRequirement);
}

public function testStoreReportingDataFailsWhenVictimRequirementisEmpty(){
    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    $caseType = CaseType::factory()->create();
    $reportedStatus = ReportedStatus::factory()->create();

    $disabilityTypes = DisabilityType::factory()->count(2)->create();
    $reportingReasons = ReportingReason::factory()->count(4)->create();
    // $victimRequirements = VictimRequirement::factory()->count(2)->create();

    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => $caseType->id,
        'case_description' => 'Deskripsi kasus',
        'chronology' => 'Kronologi kejadian',
        'reported_status_id' => $reportedStatus->id,
        'optional_disability_type' => $this->faker->sentence(),
        'optional_reporting_reason' => $this->faker->sentence(),
        'optional_phone_number' => '12345678909',
        'optional_email' => 'desiayuth@gmail.com',
        'optional_victim_requirement' => $this->faker->sentence(),
        'disability_types' => $disabilityTypes->pluck('id')->toArray(),
        'reporting_reasons' => $reportingReasons->pluck('id')->toArray(),
        'victim_requirements' => [],
    ];

    $response = $this->post(route('reportings.store'), $data);

    // $response->assertRedirect(route('reportings.user'));
    $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');

    $response->assertSessionHasErrors(['victim_requirements']);
    $this->assertDatabaseMissing('victim_requirement_reporting', [
        'reporting_id' => Reporting::where('reporter_id', $tamuSatgas->id)->value('id'),
    ]);
    // $this->assertCount(2, $reporting->victimRequirement);
}
}




