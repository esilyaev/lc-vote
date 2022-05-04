<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;



class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_check_if_user_is_an_admin()
    {
        $userOne = User::factory()->create([
            'email' => 'test@example.com'
        ]);
        $userTwo = User::factory()->create([
            'email' => 'eos@lc-vote.com'
        ]);

        $this->assertFalse($userOne->isAdmin());
        $this->assertTrue($userTwo->isAdmin());
    }
}
