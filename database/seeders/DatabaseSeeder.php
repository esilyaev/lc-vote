<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Vote;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory(19)->create();

    Category::factory()->create(['name' => 'Category 1']);
    Category::factory()->create(['name' => 'Category 2']);
    Category::factory()->create(['name' => 'Category 3']);
    Category::factory()->create(['name' => 'Category 4']);

    Status::factory()->create(['name' => 'Open']);
    Status::factory()->create(['name' => 'In progress']);
    Status::factory()->create(['name' => 'Answered']);
    Status::factory()->create(['name' => 'Closed']);
    Status::factory()->create(['name' => 'Void']);


    User::factory()->create(
      [
        'name' => 'eos',
        'email' => 'eos@lc-vote.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ]
    );
    Idea::factory(30)->create();

    // generate uniq Votes
    foreach (range(1, 20) as $user_id) {
      foreach (range(1, 30) as $idea_id) {
        if ($idea_id % 2 === 0) {
          Vote::factory()->create([
            'user_id' => $user_id,
            'idea_id' => $idea_id,
          ]);
        }
      }
    }
  }
}
