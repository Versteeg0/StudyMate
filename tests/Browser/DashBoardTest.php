<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashBoardTest extends DuskTestCase
{

    public function testSeeProgressbar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Progressbar');
        });
    }

    public function testSeeHeader()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Afgeronden modules per periode');
        });
    }
}
