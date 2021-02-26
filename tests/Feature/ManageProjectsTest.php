<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_may_not_manage_projects()
    {
        $project = Project::factory()->create();

        $this->get('/projects')->assertRedirect('/login');

        $this->get('/projects/create')->assertRedirect('/login');

        $this->get($project->path())->assertRedirect('/login');

        $this->post('/projects', $project->toArray())->assertRedirect('/login');
    }

    /** @test */
    public function authed_user_can_create_a_project()
    {
        $this->actingAs(User::factory()->create());

        $this->get('/projects/create')
            ->assertStatus(200)
            ->assertSee('Create Project');

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)
            ->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */
    public function authed_user_can_view_their_project()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function authed_user_can_not_view_others_project()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $this->get($project->path())
            ->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_title()
    {
        $project = Project::factory()->raw(['title' => '']);

        $this->actingAs(User::factory()->create());

        $this->post('/projects', $project)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_description()
    {
        $project = Project::factory()->raw(['description' => '']);

        $this->actingAs(User::factory()->create());

        $this->post('/projects', $project)
            ->assertSessionHasErrors('description');
    }
}
