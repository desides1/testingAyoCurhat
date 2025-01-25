<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Reporting;
use App\Models\User;
// use Tests\TestCase;
use Barryvdh\DomPDF\Facade as Pdf;

class DownloadReportingTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->actingAs(User::factory()->tamuSatgas()->create());
    }


    public function testShowMethodGeneratesPdf()
    {
        $reporting = Reporting::factory()->create();

        $response = $this->get(route('reportings.show', ['reporting' => $reporting->id]));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');

        $pdfContent = $response->getContent();
        $this->assertNotEmpty($pdfContent);
        $this->assertStringContainsString('%PDF', $pdfContent);
        }
}
