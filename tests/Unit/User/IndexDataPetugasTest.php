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

        // Login as Admin Satgas
        $this->actingAs(User::factory()->admin()->create());
    }

    public function test_mdp_09()
    {
        $response = $this->get('/user');

        $response->assertStatus(200);

        $html = $response->getContent();

        $user = substr_count($html, 'No data available in table');

        $this->assertEquals(1, $user);
    }

    public function test_mdp_08()
    {
        // Login as Petugas Satgas
        $this->actingAs(User::factory()->petugas()->create());

        $response = $this->get('/user');

        $response->assertStatus(403);
    }

    public function test_mdp_07()
    {
        // Login as Admin Satgas
        $this->actingAs(User::factory()->admin()->create());

        // Add Petugas Accounts
        User::factory()->count(2)->petugas()->create(['user_status' => 'active']);
        User::factory()->count(2)->petugas()->create(['user_status' => 'inactive']);

        $response = $this->get('/user');

        $response->assertSee('Active');
        $response->assertSee('Inactive');

        $response->assertStatus(200);

        $html = $response->getContent();

        $activeUser = substr_count($html, 'Active');
        $inactiveUser = substr_count($html, 'Inactive');

        $this->assertEquals(2, $activeUser, 'Jumlah pengguna aktif tidak sesuai');
        $this->assertEquals(2, $inactiveUser, 'Jumlah pengguna tidak aktif tidak sesuai');
    }

    // public function test_mdp_05()
    // {
    //     $response = $this->get('/user?status=invalid');

    //     $response->assertSee('Active');
    //     $response->assertSee('Inactive');

    //     $response->assertStatus(200);

    //     $html = $response->getContent();

    //     $activeUser = substr_count($html, 'Active');
    //     $inactiveUser = substr_count($html, 'Inactive');

    //     $this->assertEquals(2, $activeUser, 'Jumlah pengguna aktif tidak sesuai');
    //     $this->assertEquals(2, $inactiveUser, 'Jumlah pengguna tidak aktif tidak sesuai');
    // }

    public function test_mdp_04()
    {
        $this->get('/user?status=active');
        $response = $this->get('/user');

        $response->assertSee('Active');
        $response->assertSee('Inactive');

        $response->assertStatus(200);

        $html = $response->getContent();

        $activeUser = substr_count($html, 'Active');
        $inactiveUser = substr_count($html, 'Inactive');

        $this->assertEquals(2, $activeUser, 'Jumlah pengguna aktif tidak sesuai');
        $this->assertEquals(2, $inactiveUser, 'Jumlah pengguna tidak aktif tidak sesuai');
    }

    public function test_mdp_03()
    {
        $response = $this->get('/user?status=inactive');

        $response->assertSee('Inactive');

        $response->assertStatus(200);

        $html = $response->getContent();

        $inactiveUser = substr_count($html, 'Inactive');

        $this->assertEquals(2, $inactiveUser, 'Jumlah pengguna non aktif tidak sesuai');
    }

    public function test_mdp_02()
    {
        $response = $this->get('/user?status=active');

        $response->assertSee('Active');

        $response->assertStatus(200);

        $html = $response->getContent();

        $activeUser = substr_count($html, 'Active');

        $this->assertEquals(2, $activeUser, 'Jumlah pengguna aktif tidak sesuai');
    }

    public function test_mdp_01()
    {
        $response = $this->get('/user');

        $response->assertSee('Active');
        $response->assertSee('Inactive');

        $response->assertStatus(200);

        $html = $response->getContent();

        $activeUser = substr_count($html, 'Active');
        $inactiveUser = substr_count($html, 'Inactive');

        $this->assertEquals(2, $activeUser, 'Jumlah pengguna aktif tidak sesuai');
        $this->assertEquals(2, $inactiveUser, 'Jumlah pengguna tidak aktif tidak sesuai');
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
