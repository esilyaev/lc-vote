<?php

namespace Tests\Unit;

use App\Models\Idea;

use App\Models\User;

use Tests\TestCase;;

use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_count_of_each_status()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        $statusInProgress = Status::factory()->create(['name' => 'In progress']);
        $statusAnswered = Status::factory()->create(['name' => 'Answered']);
        $statusClosed = Status::factory()->create(['name' => 'Closed']);

        Idea::factory()->create([
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
        ]);

        foreach (range(0, 4) as $i) {
            Idea::factory()->create([
                'title' => 'Idea One',
                'category_id' => $category->id,
                'status_id' => $statusInProgress->id,
            ]);
        }

        foreach (range(0, 1) as $i) {
            Idea::factory()->create([
                'title' => 'Idea One',
                'category_id' => $category->id,
                'status_id' => $statusAnswered->id,
            ]);
        }

        Idea::factory()->create([
            'title' => 'Idea One',
            'category_id' => $category->id,
            'status_id' => $statusClosed->id,
        ]);

        $this->assertEquals(9, Status::GetCount()['all_statuses']);
        $this->assertEquals(1, Status::GetCount()['open']);
        $this->assertEquals(5, Status::GetCount()['in_progress']);
        $this->assertEquals(2, Status::GetCount()['answered']);
        $this->assertEquals(1, Status::GetCount()['closed']);
    }
}
