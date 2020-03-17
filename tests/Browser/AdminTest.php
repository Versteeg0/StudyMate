<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class AdminTest extends DuskTestCase
{
    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(user::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/')
                    ->assertSee('Je bent ingelogd als admin!');
        });
    }

    public function testTeacherCreate() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                    ->visit('/admin/teacher')
                    ->clickLink('Docent Toevoegen')
                    ->type('teacher_first_name', 'Bob')
                    ->type('teacher_prefix', 'van')
                    ->type('teacher_last_name', 'Polis')
                    ->press("input[type=submit]")
                    ->assertSee('Docent Toevoegen');
        });
    }

    public function testModuleOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(user::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/module')
                ->assertPresent('#moduleToevoegen');
        });
    }

    public function testFileOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(user::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/file')
                ->assertPresent('#bestandUploaden');
        });
    }
}
