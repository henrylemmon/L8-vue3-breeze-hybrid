<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /* may be redundant but for learning purposes :) */

    /** @test */
    public function guests_may_not_visit_home_page()
    {
        $this->get('/projects')->assertRedirect('/login');
    }

    /** @test */
    public function render_login_view()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_authorized_user_can_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /** @test */
    public function an_unauthorized_user_can_not_log_in()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'WRONGpassword',
        ]);

        $this->assertGuest();
    }

    /** @test */
    public function authenticated_users_can_log_out()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->post('/logout');

        $this->assertGuest();
    }

    /** @test */
    public function password_can_not_be_blank()
    {
        $user = User::factory()->create(['password' => '']);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password,
        ])->assertSessionHasErrors('password');
    }

    /** @test */
    public function email_can_not_be_blank()
    {
        $user = User::factory()->create(['email' => '']);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');
    }

    /** @test */
    public function email_must_be_valid()
    {
        $user = User::factory()->create(['email' => 'notavalidemail']);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');
    }
}
