<?php

namespace Tests\Service;

use App\Service\CostCalculator;
use PHPUnit\Framework\TestCase;

class CostCalculatorTest extends TestCase
{
    public function testLess50000()
    {
        $calc = new CostCalculator();
        $result = $calc->calculate(40000);

        $this->assertEquals(34800, $result);
    }

    public function testOver50000()
    {
        $calc = new CostCalculator();
        $result = $calc->calculate(60000);

        $this->assertEquals(51700, $result);
    }    
}