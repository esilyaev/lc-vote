<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\SetStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminSetStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_page_contains_set_status_component_when_user_is_admin()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var User $admin */
        $admin = User::factory()->create(
            ['email' => 'eos@lc-vote.com']
        );
        $categoryOne = Category::factory()->create(
            ['name' => 'Category 1']
        );

        Status::factory(2)->create();

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => 1,
        ]);


        $this->actingAs($user)
            ->get(route('idea.show', $ideaOne))
            ->assertDontSeeLivewire('set-status');

        $this->actingAs($admin)
            ->get(route('idea.show', $ideaOne))
            ->assertSeeLivewire('set-status');
    }

    public function test_initial_status_set_correct()
    {
        /** @var User $admin */
        $admin = User::factory()->create(
            ['email' => 'eos@lc-vote.com']
        );

        $categoryOne = Category::factory()->create(
            ['name' => 'Category 1']
        );

        $statusOpened = Status::factory()->create(
            ['name' => 'Open', 'id' => 1]
        );

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpened->id,
        ]);

        Livewire::actingAs($admin)
            ->test(SetStatus::class, [
                'idea' => $ideaOne,
            ])
            ->assertSet('status', $statusOpened->id);
    }

    public function test_can_set_status()
    {
        /** @var User $admin */
        $admin = User::factory()->create(
            ['email' => 'eos@lc-vote.com']
        );

        $categoryOne = Category::factory()->create(
            ['name' => 'Category 1']
        );

        $statusOpened = Status::factory()->create(
            ['name' => 'Open', 'id' => 1]
        );

        $statusAnswered = Status::factory()->create(
            ['name' => 'Answered', 'id' => 3]
        );

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpened->id,
        ]);

        Livewire::actingAs($admin)
            ->test(SetStatus::class, [
                'idea' => $ideaOne,
            ])
            ->set('status', $statusAnswered->id)
            ->call('setStatus')
            ->assertEmitted('statusWasUpdated');

        $this->assertDatabaseHas('ideas', [
            'id' => $ideaOne->id,
            'status_id' => $statusAnswered->id,
        ]);
    }
}
