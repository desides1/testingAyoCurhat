<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reporting;
use App\Models\ReportingProgress;
use App\Models\User;


class ReportingCreateProgressTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    protected function setUp(): void
    {
     parent::setUp();
     $this->seed(\Database\Seeders\DatabaseSeeder::class);
     $this->admin = User::factory()->admin()->create();
     $this->tamuSatgas = User::factory()->tamuSatgas()->create();
 }

//  public function testListLaporanIsDisplayed()
//  {
//      Reporting::factory()->count(5)->create();
//      $response = $this->actingAs($this->admin)->get('/reportings');
//      // Cek apakah responsnya sukses (kode status 200)
//      $response->assertStatus(200);
//       // Cek apakah view yang dihasilkan sesuai
//       $response->assertViewIs('reporting.index');
//       // Cek apakah view memiliki data yang diharapkan
//       $response->assertViewHas('reportings');
//  }



 public function testNoteIsDisplayedInAdminAndTamuSatgas()
 {
      // Buat instance Reporting dan ReportingProgress terkait
 $reporting = 1;
 $note = "Progress note untuk testing.";
 ReportingProgress::factory()->create([ 'reporting_id' => $reporting->id, 'note' => $note, ]);
 // Panggil endpoint untuk admin
 $responseAdmin = $this->actingAs($this->admin)->get(route('reportings.progress', ['id' => $reporting->id]));
 $responseAdmin->assertStatus(200); $responseAdmin->assertSee($note);
 // Panggil endpoint untuk tamu satgas
 $responseTamuSatgas = $this->actingAs($this->tamuSatgas)->get(route('reportings.progress', ['id' => $reporting->id]));
 $responseTamuSatgas->assertStatus(200); $responseTamuSatgas->assertSee($note);
 }


 public function testShortNoteShowsAlert()
 { // Buat instance Reporting
 $reporting = Reporting::factory()->create();
 // Input note yang kurang dari 20 karakter
 $shortNote = "sip masuk";
 // Simpan ReportingProgress dengan note yang pendek
 $response = $this->actingAs($this->admin)->post(route('reportings.progress.create'), [ 'reporting_id' => $reporting->id, 'note' => $shortNote, ]);
 // Cek apakah alert muncul
 $response->assertSessionHasErrors(['note']);
 }


 public function testLongNoteShowsAlert()
 { // Buat instance Reporting
     $reporting = Reporting::factory()->create();
     // Input note yang lebih dari 100 karakter
     $longNote = "Pengaduan telah kami proses,
     tunggu update selanjutnya, jangan lupa follow instagram satgas ppks poliwangi.
     Ini adalah pesan yang terlalu panjang.";
     // Simpan ReportingProgress dengan note yang panjang
     $response = $this->actingAs($this->admin)->post(route('reportings.progress.create'),
     [ 'reporting_id' => $reporting->id, 'note' => $longNote, ]);
      // Cek apakah alert muncul
      $response->assertSessionHasErrors(['note']);
     }
}
