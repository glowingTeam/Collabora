<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class registerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function user_can_register_with_correct_credentials()
    {
        $response = $this->post('/register', [
            'name' => ''
        ]);

        $response->assertStatus(200);
    }
}
