<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Module;

class DeadlineTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testWhen_earned_EC_Attribute_is_correct()
    {
        // arrange
        $oModule = new Module();

        // act
        $getTotalEarnedEC = $oModule->getTotalECAttribute();

        // assert
        $this->assertEquals(0);
    }
}
