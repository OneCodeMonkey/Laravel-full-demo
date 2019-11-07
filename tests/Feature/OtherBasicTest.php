<?php


namespace Tests\Feature;

use Tests\TestCase;

class OtherBasicTest extends TestCase
{
    /**
     *  test examples
     */
    public function testNumericTest()
    {
        $this->assertFalse(1 == 2);
        $this->assertTrue(10 == 2 * 5);
    }
}