<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\IdeaShow;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteShowPageTest extends TestCase
{
  use RefreshDatabase;
  /*
   * A basic feature test example.
   *
   * @return void
   */

  public function test_not_logged_user_redirected_on_login_page_if_try_to_vote()
  {

    $user = User::factory()->create();
    $category = Category::factory()->create();
    $status = Status::factory()->create();

    $idea = Idea::factory()->create([
      'user_id' => $user->id,
      'category_id' => $category->id,
      'status_id' => $status->id,
      'title' => 'My first idea',
      'description' => 'my first idea description',
    ]);

    Livewire::test(IdeaShow::class, [
      'idea' => $idea,
      'votesCount' => 5,
    ])
      ->call('vote')
      ->assertRedirect(route('login'));
  }

  public function test_logged_user_can_vote_for_idea()
  {

    $user = User::factory()->create();
    $category = Category::factory()->create();
    $status = Status::factory()->create();

    $idea = Idea::factory()->create([
      'user_id' => $user->id,
      'category_id' => $category->id,
      'status_id' => $status->id,
      'title' => 'My first idea',
      'description' => 'my first idea description',
    ]);

    Livewire::actingAs($user)
      ->test(IdeaShow::class, [
        'idea' => $idea,
        'votesCount' => 5,
      ])
      ->call('vote')
      ->assertSet('votesCount', 6)
      ->assertSet('hasVoted', true)
      ->assertSee('Voted');

    $this->assertDatabaseHas('votes', [
      'user_id' => $user->id,
      'idea_id' => $idea->id
    ]);
  }

  public function test_logged_user_can_remove_vote()
  {

    $user = User::factory()->create();
    $category = Category::factory()->create();
    $status = Status::factory()->create();

    $idea = Idea::factory()->create([
      'user_id' => $user->id,
      'category_id' => $category->id,
      'status_id' => $status->id,
      'title' => 'My first idea',
      'description' => 'my first idea description',
    ]);

    Livewire::actingAs($user)
      ->test(IdeaShow::class, [
        'idea' => $idea,
        'votesCount' => 5,
      ])
      ->call('vote')
      ->call('vote')
      ->assertSet('votesCount', 5)
      ->assertSee('Vote');

    $this->assertDatabaseMissing('votes', [
      'user_id' => $user->id,
      'idea_id' => $idea->id
    ]);
  }
}
