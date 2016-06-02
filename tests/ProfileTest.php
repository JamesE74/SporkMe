<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateProfile()
    {
        // Generate user to create fake login
        $user = factory(App\User::class)->create();

        // Create fake profile information
        $profile = factory(App\Profile::class)->make();


        $this->actingAs($user)
            ->visit('/profiles/create')
            ->type($profile->nickname, 'nickname')
            ->type($profile->fork_reason, 'fork_reason')
            ->type($profile->spoon_reason, 'spoon_reason')
            ->press('create_profile')
            ->see('You just created a profile');
    }
}
