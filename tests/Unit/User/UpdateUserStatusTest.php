<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserStatusTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        // Login as Petugas Satgas
        $this->actingAs(User::factory()->petugas()->create());
    }

    public function test_nap_05(): void
    {
        $petugas = User::factory()->petugas()->create();

        $response = $this->patch(route('users.status.update', ['id' => $petugas->id]), ['status' => 'inactive']);

        $response->assertStatus(403);
    }

    public function testToInactiveUserStatus(): void
    {
        $petugas = User::factory()->petugas()->create();

        $response = $this->patch(route('users.status.update', ['id' => $petugas->id]), ['status' => 'inactive']);

        // Refrrsh data di db
        $petugas->refresh();

        // Cek status di db
        $this->assertEquals('inactive', $petugas->user_status);

        $response->assertRedirect(route('users.index'));
    }

    public function testToActiveUserStatus(): void
    {
        $petugas = User::factory()->petugas()->create(['user_status' => 'inactive']);

        $response = $this->patch(route('users.status.update', ['id' => $petugas->id]), ['status' => 'active']);

        // Refrrsh data di db
        $petugas->refresh();

        // Cek status di db
        $this->assertEquals('active', $petugas->user_status);

        $response->assertRedirect(route('users.index'));
    }

    public function testToInvalidUserStatus(): void
    {
        $petugas = User::factory()->petugas()->create(['user_status' => 'inactive']);

        $response = $this->patch(route('users.status.update', ['id' => $petugas->id]), ['status' => 'abc']);

        // Refrrsh data di db
        $petugas->refresh();

        // Cek status di db
        $this->assertEquals('inactive', $petugas->user_status);

        $response->assertRedirect(route('users.index'));
    }
}
