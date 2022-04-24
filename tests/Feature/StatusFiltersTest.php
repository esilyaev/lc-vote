<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\StatusFilters;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertEquals;

class StatusFiltersTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_contains_status_filters_livewire_component()
    {
        $this->seed();

        $this->get(route('idea.index'))
            ->assertSeeLivewire('status-filters');
    }

    public function test_show_page_contains_status_filters_livewire_component()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'description' => 'Idea One'
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('status-filters');
    }

    public function test_shows_correct_statuses_count()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        $statusInProgress = Status::factory()->create(['name' => 'In progress']);
        $statusAnswered = Status::factory()->create(['name' => 'Answered']);
        $statusClosed = Status::factory()->create(['name' => 'Closed']);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusAnswered->id,
            'description' => 'Idea One'
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusAnswered->id,
            'description' => 'Idea One'
        ]);


        Livewire::test(StatusFilters::class)
            ->assertSee("All Items (2)")
            ->assertSee("Answered (2)")
            ->assertSee("Opened (0)");
    }

    public function test_filtering_works_when_query_string_in_place()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        $statusInProgress = Status::factory()->create(['name' => 'In progress']);
        $statusAnswered = Status::factory()->create(['name' => 'Answered']);
        $statusClosed = Status::factory()->create(['name' => 'Closed']);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusAnswered->id,
            'description' => 'Idea One'
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusClosed->id,
            'description' => 'Idea One'
        ]);

        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('<div class="bg-cyan-200  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Answered</div>', false);
        $response->assertSee('<div class="bg-gray-400  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Closed</div>', false);

        $response = $this->get(route('idea.index', ['status' => 'Closed']));
        $response->assertSuccessful();
        $response->assertDontSee('<div class="bg-cyan-200  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Answered</div>', false);
        $response->assertSee('<div class="bg-gray-400  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Closed</div>', false);

        $response = $this->get(route('idea.index', ['status' => 'Answered']));
        $response->assertSuccessful();
        $response->assertSee('<div class="bg-cyan-200  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Answered</div>', false);
        $response->assertDontSee('<div class="bg-gray-400  text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Closed</div>', false);
    }
}
