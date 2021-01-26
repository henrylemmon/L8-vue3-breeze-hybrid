<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordResetTest extends TestCase
{
    /** @test */
    public function render_reset_password_view()
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
    }

    /** @test */
    public function reset_password_link_can_be_requested()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }
}
