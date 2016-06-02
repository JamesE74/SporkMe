<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * A test of user creation and auto login
     *
     * @return void
     */
    public function testRegistration()
    {
        $user = factory(App\User::class)->make();

        $this->visit('/register')
            ->type($user->name, 'name')
            ->type($user->email, 'email')
            ->type($user->password, 'password')
            ->type($user->password, 'password_confirmation')
            ->press('Register')
            ->visit('/home')
            ->see('You are logged in!');
    }
}
