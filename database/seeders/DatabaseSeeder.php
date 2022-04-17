<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
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
        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'In progress']);
        Status::factory()->create(['name' => 'Answered']);
        Status::factory()->create(['name' => 'Closed']);
        Status::factory()->create(['name' => 'Void']);

        Idea::factory(30)->create();

        User::factory()->create(
            [
                'name' => 'eos',
                'email' => 'eos@lc-vote.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
    }
}
