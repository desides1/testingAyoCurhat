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
        $user = User::factory()->create();
        $user->givePermissionTo('emergency_call_access');

        $this->actingAs($user);

        $response = $this->get(route('emergency_call'));
        $response->assertStatus(200);
        $response->assertViewIs('emergency-call.index');
        $response->assertViewHas('title', 'Panggilan Darurat');
    }

    /** @test */
    public function user_without_permission_cannot_view_emergency_call_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('emergency_call'));

        $response->assertStatus(403);
    }

    public function test_whatsapp_link_is_correct()
    {
        $wrong_number = '081234660827';
        $number = '6282139443573';
        $this->withoutMiddleware();
        $response = $this->get('emergency-call');
        $response->assertStatus(200);
        $expected = 'https://wa.me/' . $number;
        $response->assertSee($expected);
        $wrong_link = 'https://wa.me/' . $wrong_number;
        $response->assertDontSee($wrong_link);
    }
}
