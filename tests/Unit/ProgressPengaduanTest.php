<?php

namespace Tests\Unit;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class ProgressPengaduanTest extends TestCase
{
    /**
     * A basic unit test example.
     */

     public function setUp(): void
     {
        $user = User::first();
        $this->actingUs($user);
     }

   public function view_test()
   {
    $response = $this->get(route('reportings.progress'));

    $response->assertStatus(200);

   }
}
