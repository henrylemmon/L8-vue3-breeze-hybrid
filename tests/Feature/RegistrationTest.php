<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function render_registration_view()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_register_users()
    {
        $user = User::factory()->raw();

        $response = $this->post('/register', [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }

    /** @test */
    public function name_cant_be_blank()
    {
        $user = User::factory()->raw([
            'name' => '',
        ]);

        $this->post('/register', [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertSessionHasErrors('name')
            ->assertSessionDoesntHaveErrors(['password', 'email']);
    }

    /** @test */
    public function email_cant_be_blank()
    {
        $user = User::factory()->raw([
            'email' => '',
        ]);

        $this->post('/register', [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertSessionHasErrors('email')
            ->assertSessionDoesntHaveErrors(['password', 'name']);
    }

    /** @test */
    public function email_must_be_email()
    {
        $user = User::factory()->raw([
            'email' => 'notanemail',
        ]);

        $this->post('/register', [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertSessionHasErrors('email')
            ->assertSessionDoesntHaveErrors(['password', 'name']);
    }

    /** @test */
    public function passwords_must_match()
    {
        $user = User::factory()->make();

        $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'passwordNa',
            'password_confirmation' => 'passwordDa'
        ])
            ->assertSessionHasErrors('password')
            ->assertSessionDoesntHaveErrors(['name', 'email']);
    }
}
