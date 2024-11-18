<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $admin = User::factory()->admin()->create();
    }
    
    public function test_index_without_status_parameter()
    {
        $this->actingAs(User::factory()->admin()->create());

        $response = $this->get('/user');
        
        $response->assertStatus(200);
    }

    public function test_index_with_status_active()
    {
        $this->actingAs(User::factory()->admin()->create());

        $response = $this->get('/user?status=active');
        
        $response->assertStatus(200);
    }

    public function test_index_with_status_inactive()
    {
        $this->actingAs(User::factory()->admin()->create());
        
        $response = $this->get('/user?status=inactive');
        
        $response->assertStatus(200);
    }

    // php artisan make:test UserControllerTest
}