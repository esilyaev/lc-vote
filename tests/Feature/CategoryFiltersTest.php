<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\IdeasIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFiltersTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_selected_category_filters_filter_correct()
    {
        User::factory(2)->create();
        $categoryOne = Category::factory()->create(
            ['name' => 'Category 1']
        );
        $categoryTwo = Category::factory()->create(
            ['name' => 'Category 2']
        );
        Status::factory(2)->create();

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => 1,
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My second idea',
            'description' => 'Description of my second idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => 1,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('category', $categoryOne->name)
            ->assertViewHas('ideas', function ($ideas) use ($categoryOne) {
                return $ideas->count() === 2 && $ideas->first()->category->id = $categoryOne->id;
            });

        Livewire::test(IdeasIndex::class)
            ->set('category', $categoryTwo->name)
            ->assertViewHas('ideas', function ($ideas) use ($categoryTwo) {
                return $ideas->count() === 0;
            });
    }

    public function test_query_string_set_correct_category_filters()
    {
        User::factory(2)->create();
        $categoryOne = Category::factory()->create(
            ['name' => 'Category 1']
        );
        $categoryTwo = Category::factory()->create(
            ['name' => 'Category 2']
        );
        Status::factory(2)->create();

        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of my first idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => 1,
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My second idea',
            'description' => 'Description of my second idea',
            'user_id' => 1,
            'category_id' => $categoryOne->id,
            'status_id' => 1,
        ]);

        Livewire::withQueryParams(['category' => $categoryOne->name])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function ($ideas) use ($categoryOne) {
                return $ideas->count() === 2 && $ideas->first()->category->id === $categoryOne->id;
            });
    }
}
