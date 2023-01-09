<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User; // Tambahkan use model App\User
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_success_login_user()
    {
    
      $user = User::factory()->create();

      $response = $this->post('/login', [
          'login' => $user->username,
          'password' => 'password',
          '_token' => csrf_token()
      ]);

      $this->assertAuthenticatedAs($user);
      $response->assertRedirect(route('admin_dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'login' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
