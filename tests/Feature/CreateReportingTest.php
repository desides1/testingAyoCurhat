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

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

    public function testStoreReportingData()
    {
        // Membuat user untuk autentikasi dan menyimpannya dalam variabel
        $tamuSatgas = User::factory()->tamuSatgas()->create();

        // Autentikasi sebagai user yang baru dibuat
        $this->actingAs($tamuSatgas);

        // Membuat data model terkait menggunakan factory
        $caseType = CaseType::factory()->create();
        $reportedStatus = ReportedStatus::factory()->create();

        // Buat data pivot dengan factory
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

        // Mengirim request POST ke route store
        $response = $this->post(route('reportings.store'), $data);

        // Assert bahwa pengaduan berhasil ditambahkan dan diarahkan ke halaman yang benar
        $response->assertRedirect(route('reportings.user'));
        $response->assertSessionHas('success', 'Pengaduan berhasil ditambahkan');

        // Assert bahwa data pengaduan tersimpan di database
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

        // Assert hubungan pivot table tersimpan
        $reporting = Reporting::where('reporter_id', $tamuSatgas->id)->first();
        $this->assertCount(2, $reporting->disabilityType);
        $this->assertCount(1, $reporting->reportingReason);
        $this->assertCount(2, $reporting->victimRequirement);
    }


    public function testStoreReportingDataFailsWhenReporterStatusIsEmpty()
    {
        // Autentikasi sebagai user yang dibuat untuk tes
        $tamuSatgas = User::factory()->tamuSatgas()->create();
        $this->actingAs($tamuSatgas);

        // Membuat data model terkait menggunakan factory
        $caseType = CaseType::factory()->create();
        $reportedStatus = ReportedStatus::factory()->create();

        // Buat data pivot dengan factory
        $disabilityTypes = DisabilityType::factory()->count(2)->create();
        $reportingReasons = ReportingReason::factory()->count(1)->create();
        $victimRequirements = VictimRequirement::factory()->count(2)->create();

        // Data pengaduan dengan `reporter_as` kosong
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

        // Kirim request POST ke route store
        $response = $this->post(route('reportings.store'), $data);

        // Assert bahwa ada error untuk field `reporter_as`
        $response->assertSessionHasErrors([
            'reporter_as' => 'Status pelapor wajib diisi'
        ]);
    }

    public function testStoreReportingDataFailsWhenCaseTypeIsEmpty()
{
    $tamuSatgas = User::factory()->tamuSatgas()->create();
    $this->actingAs($tamuSatgas);

    // Hilangkan middleware jika perlu
    $this->withoutMiddleware();

    // Membuat data model terkait menggunakan factory
    $reportedStatus = ReportedStatus::factory()->create();

    // Data pengaduan dengan `case_type_id` kosong
    $data = [
        'reporter_as' => 'saksi',
        'case_type_id' => '', // Kosongkan field ini untuk memicu error
        'case_description' => 'Deskripsi kasus',
        'chronology' => 'Kronologi kejadian',
        'reported_status_id' => $reportedStatus->id,
        'optional_phone_number' => '08123456789',
        'optional_email' => 'user@example.com',
    ];

    // Kirim request POST ke route store
    $response = $this->post(route('reportings.store'), $data);

    // Assert bahwa ada error untuk field `case_type_id`
    $response->assertSessionHasErrors([
        'case_type_id' => 'Jenis kasus wajib dipilih'
    ]);
}



}




