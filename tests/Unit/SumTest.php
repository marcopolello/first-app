<?php

use PHPUnit\Framework\TestCase;

include_once 'app/Helpers/helpers.php';

class SumTest extends TestCase
{
    public function testSum()
    {
        $result = sum(1, 2);
        $this->assertEquals(3, $result);
    }

    public function testPerformsSums()
    {
        $result = sum(1, 2);
        $this->assertEquals(3, $result);
    }

}