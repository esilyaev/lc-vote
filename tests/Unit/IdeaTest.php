<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_check_idea_voted_by_user()
    {
        $user = User::factory()->create();
        $userTwo = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser($userTwo));
        $this->assertFalse($idea->isVotedByUser(null));
    }

    public function test_logged_user_can_vote_for_idea()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $this->assertFalse($idea->isVotedByUser($user));
        $idea->vote($user);
        $this->assertTrue($idea->isVotedByUser($user));
    }

    public function test_logged_user_can_remove_vote_for_idea()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();


        $idea = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $idea->vote($user);
        $this->assertTrue($idea->isVotedByUser($user));
        $idea->removeVote($user);
        $this->assertFalse($idea->isVotedByUser($user));
    }
    public function test_exception_on_voting_and_removing_vote()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        $this->expectException(DuplicateVoteException::class);
        $idea->vote($user);

        Vote::where('user_id', $user->id)
            ->where('idea_id', $idea->id)
            ->first()
            ->delete();

        $this->expectException(VoteNotFoundException::class);
        $idea->vote($user);
    }
}
