<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeadlineTest extends DuskTestCase
{

    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'deadline@gmail.com')->First());
            $browser->visit('/deadline/index')
                    ->assertSee('Welkom bij de Deadline Manager');
        });
    }

    public function testEditDeadline()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'deadline@gmail.com')->First());
            $browser->visit('/deadline/index')
                    ->clickLink('Bekijk')
                    ->assertSee('Subject:');
        });
    }
}
