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

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->seed(CaseTypeSeeder::class);
    //     $this->seed(ReportedStatusSeeder::class);
    //     // $this->seed(\Database\Seeders\DatabaseSeeder::class);
    //     $this->seed(PermissionsSeeder::class);
    //     $admin = User::factory()->admin()->create();
    // }

    // public function testProgressPageIsDisplayed()
    // {
    //     $this->actingAs(User::factory()->admin()->create());
    //     // $this->seed(CaseTypeSeeder::class);
    //     // Buat instance Reporting beserta 3 data ReportingProgress terkait
    //     $reporting = Reporting::factory() ->has(ReportingProgress::factory()->count(3), 'reportingProgress')->create();
    //     // Panggil endpoint yang akan menampilkan halaman progress
    //     $response = $this->get(route('reportings.progress', ['id' => $reporting->id]));

    //     // Cek apakah responsnya sukses (kode status 200)
    //     $response->assertStatus(200);

    //     // Cek apakah halaman menampilkan judul "Progress Pengaduan"
    //     $response->assertSee('bismillah');

    //     // Cek apakah ada data progress pengaduan yang ditampilkan di halaman
    //     $response->assertViewHas('reporting');
    // }

    protected function setUp(): void {
        parent::setUp();
         $this->seed(\Database\Seeders\DatabaseSeeder::class);
          $this->actingAs(User::factory()->tamuSatgas()->create());
        }
    public function testProgressPageIsDisplayed()
    {
        $id = 1;
        $response = $this->get(route('reportings.progress', ['id' => $id]));
        // $response = $this->get(route('reportings.progress'));
        // Cek apakah responsnya sukses (kode status 200)
        $response->assertStatus(200);
        // Cek apakah view yang dihasilkan sesuai
        $response->assertViewIs('reporting.index-progress');
        // Cek apakah view memiliki data yang diharapkan
        $response->assertViewHasAll(['title', 'reporting', 'reportingProgress']);
    }

}
