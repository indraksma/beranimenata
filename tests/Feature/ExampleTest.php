<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_public_pages_return_successful_responses(): void
    {
        $this->get('/')->assertStatus(200);
        $this->get('/peta-masa-depan')->assertStatus(200);
        $this->get('/edukasi')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
    }

    public function test_admin_page_requires_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }
}
