<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    use RefreshDatabase;
    public function test_index()
    {
      $user = User::factory()->create();
      $this->actingAs($user);
      $response = $this->get(route('users.index'));
      $response->assertStatus(200);
    }
}
