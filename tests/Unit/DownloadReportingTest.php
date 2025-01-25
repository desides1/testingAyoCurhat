<?php

// namespace Tests\Unit;

// use Illuminate\Container\Attributes\Auth;

// use Illuminate\Auth\Access\Gate;
// use Mockery;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
// use PHPUnit\Framework\TestCase;

// class DownloadReportingTest extends TestCase
// {
//     /**
//      * A basic unit test example.
//      */
//     public function testFormDownloadResponse()
//     {
//         $user = new \App\Models\User([
//             'id' => 4,
//             'name' => 'Desi Ayu T',
//             'password' => 1234
//         ]);

//         Gate::shouldReceive('allows')
//             ->with('show_detail_reportings')
//             ->andReturn(true);

//         Gate::shouldReceive('authorize')
//             ->with('show_detail_reportings')
//             ->andReturn(true);

//         // Mengautentikasi user dan melakukan request
//         $response = $this->actingAs($user)->get(route('reportings.show'));

//         $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
//         $response->assertStatus(200);
//         $response->assertSee('Unduh PDF');
//     }

//     // Memeriksa nama file
//     public function testFormDownloadFileName()
//     {
//         $user = new \App\Models\User([
//             'id' => 1,
//             'name' => 'Test User',
//             'email' => 'test@example.com'
//         ]);
//         Auth::shouldReceive('check')->andReturn(true);
//         Auth::shouldReceive('user')->andReturn($user);
//         $response = $this->get('/show');
//         $response->assertHeader('Content-Disposition', 'inline; filename="download.pdf"');
//     }

//     // Memeriksa konten file
//     public function testFormDownloadContent()
//     {
//         $user = new \App\Models\User([
//             'id' => 1,
//             'name' => 'Test User',
//             'email' => 'test@example.com'
//         ]);
//         Auth::shouldReceive('check')->andReturn(true);
//         Auth::shouldReceive('user')->andReturn($user);
//         $response = $this->get('/show');
//         $content = $response->getContent();
//         $this->assertStringContainsString('Expected content', $content);
//     }

//     // Penggunaan autentikasi dan otorisasi
//     public function testFormDownloadRequiresAuthentication()
//     {
//         $response = $this->get('/show');
//         $response->assertRedirect('/login');
//     }

//     public function testFormDownloadRequiresAuthenticationn()
//     {
//         $user = new \App\Models\User([
//             'id' => 1,
//             'name' => 'Unauthorized User',
//             'email' => 'unauthorized@example.com'
//         ]);

//         Auth::shouldReceive('check')->andReturn(true);
//         Auth::shouldReceive('user')->andReturn($user);
//         Gate::shouldReceive('allows')->with('show_detail_reportings')->andReturn(false);

//         $response = $this->actingAs($user)->get('/show');
//         $response->assertStatus(403);
//     }
// }

/**  TIDAK MENGGUNAKAN KODE UNTUK MENGETESNYA -> MENGGUNAKAN KATALON */
