<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_show_on_main_page()
    {
        User::factory(2)->create();
        Category::factory(2)->create();
        Status::factory(2)->create();

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => 1,
            'status_id' => 1,
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My second idea',
            'description' => 'Description of my second idea',
            'user_id' => 1,
            'category_id' => 1,
            'status_id' => 1,
        ]);



        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaTwo->title);
    }
}
