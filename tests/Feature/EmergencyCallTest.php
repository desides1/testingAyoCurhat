<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmergencyCallTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

    /** @test */
    public function user_with_permission_can_view_emergency_call_page()
    {
        // Buat pengguna dengan permission 'emergency_call_access'
        $user = User::factory()->create();
        $user->givePermissionTo('emergency_call_access');

        // Login sebagai pengguna tersebut
        $this->actingAs($user);

        // Akses halaman emergency call
        $response = $this->get(route('emergency_call'));

        // Pastikan respons statusnya 200
        $response->assertStatus(200);

        // Pastikan view yang diharapkan ditampilkan
        $response->assertViewIs('emergency-call.index');

        // Pastikan data 'title' dikirimkan ke view
        $response->assertViewHas('title', 'Panggilan Darurat');
    }

    /** @test */
    public function user_without_permission_cannot_view_emergency_call_page()
    {
        // Buat pengguna tanpa permission 'emergency_call_access'
        $user = User::factory()->create();

        // Login sebagai pengguna tersebut
        $this->actingAs($user);

        // Akses halaman emergency call
        $response = $this->get(route('emergency_call'));

        // Pastikan respons statusnya 403 (Forbidden)
        $response->assertStatus(403);
    }
}
