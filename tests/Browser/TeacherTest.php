<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class TeacherTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(user::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/teacher')
                    ->assertSee('Docent Toevoegen');
        });
    }

    public function testCreate() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
            $browser->visit('/admin/create');
            $browser->clickLink('Docent Toevoegen');
            $browser->type('teacher_first_name', 'Bob');
            $browser->type('teacher_prefix', 'van');
            $browser->type('teacher_last_name', 'Polis');

            $browser->click("input[type=submit");
            $browser->assertSee('Docent Toevoegen');
        });
    }
}
