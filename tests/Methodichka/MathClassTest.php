<?php

use \PHPUnit\Framework\TestCase;

require_once 'MathClass.php';

class MathClassTest extends TestCase
{
    public function testFactorial()
    {
        $my = new MathClass();
        $this->assertEquals(6, $my->factorial(3));
    }
}
