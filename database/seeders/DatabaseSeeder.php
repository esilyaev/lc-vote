<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Faker\Generator;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Category;
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

        $ideasCount = 100;
        $usersCount = 19;
        User::factory($usersCount)->create();

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
        Idea::factory($ideasCount)->create();

        // generate uniq Votes
        // foreach (range(1, 20) as $user_id) {
        //     foreach (range(1, $ideasCount) as $idea_id) {
        //         if ($idea_id % 2 === 0) {
        //             Vote::factory()->create([
        //                 'user_id' => $user_id,
        //                 'idea_id' => $idea_id,
        //             ]);
        //         }
        //     }
        // }
        $generator = new Generator();

        foreach (Idea::all() as $idea) {
            $votes_count = $generator->numberBetween(0, $usersCount + 1);
            for ($i = 0; $i < $votes_count; $i++) {
                Vote::factory()->create([
                    'user_id' => $i + 1,
                    'idea_id' => $idea->id,
                ]);
            }
        }

        foreach (Idea::all() as $idea) {
            $comments_count = $generator->numberBetween(1, 5);

            for ($i = 0; $i < $comments_count; $i++) {
                Comment::factory()->create([
                    'user_id' => $generator->numberBetween(1, $usersCount + 1),
                    'idea_id' => $idea->id,
                ]);
            }
        }
    }
}
