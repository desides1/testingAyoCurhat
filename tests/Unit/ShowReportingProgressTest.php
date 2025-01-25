<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Mockery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ShowReportingProgressTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();;

        // Buat mockup pengguna Tamu Satgas
        // $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $tamuSatgas = User::factory()->tamuSatgas();

        // Assign role "Tamu Satgas"
        // $tamuSatgas->assignRole('Tamu Satgas');
    }

    public function test_index_reporting_progress_view()
    {
        // Mock view untuk mengembalikan data buatan
        // $tamuSatgas = $this->actingAs(User::factory()->tamuSatgas()->create());
        // $this->actingAs($this->$tamuSatgas);
        // $tamuSatgas = User::factory()->tamuSatgas();
        // $tamuSatgas = User::factory()->tamuSatgas()->create();
        // $this->actingAs($tamuSatgas);
        $user = User::factory()->create()->assignRole('Tamu Satgas'); // Adjust role as needed
        $this->actingAs($user);
        // View::shouldReceive('make')
        //     ->with('reporting.index-progress', \Mockery::on(function ($data) {
        //         return $data['note'] === 'Ut omnis provident laborum distinctio.';
        //     }))
        //     ->once()
        //     ->andReturnSelf();

        // Panggil metode dan lakukan pengecekan
        $response = $this->get(route('reportings.progress', $user->id));
        $response->assertStatus(200);
    }
}
