<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class loginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $user = Account::factory()->create([
            'name' => 'marning',
            'email' => 'marning@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password'), // Menggunakan Hash::make() untuk password
        ]);

        $response = $this->post('/masuk', [
            'email' => 'marning@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302); // Status 302 adalah redirect setelah login sukses
        $this->assertAuthenticatedAs($user); // Memastikan bahwa user yang login adalah user yang benar
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        $user = Account::factory()->create([
            'email' => 'marni@gmail.com',
            'password' => Hash::make('password'), // Menggunakan Hash::make()
        ]);

        $response = $this->post('/masuk', [
            'email' => 'marni@gmail.com',
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(302); // Redirect jika login gagal
        $this->assertGuest(); // Memastikan user tidak berhasil login
    }

    /** @test */
    public function login_requires_email_and_password()
    {
        $response = $this->post('/masuk', []);

        $response->assertSessionHasErrors(['email', 'password']); // Memastikan error muncul untuk email dan password
        $this->assertGuest(); // Memastikan user tidak berhasil login
    }
}
