<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexDataPetugasTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->actingAs(User::factory()->admin()->create());
    }

    public function testViewNullStatus()
    {
        $response = $this->get('/user?status=');

        $response->assertStatus(200);
    }

    public function testViewAllUser()
    {
        $response = $this->get('/user');

        $response->assertStatus(200);
    }

    public function testViewActiveUser()
    {
        $response = $this->get('/user?status=active');

        $response->assertStatus(200);
    }

    public function testViewInactiveUser()
    {
        $response = $this->get('/user?status=inactive');

        $response->assertStatus(200);
    }

    public function testViewInvalidUserStatus()
    {
        $response = $this->get('/user?status=abc');

        $response->assertStatus(302);
    }
}
