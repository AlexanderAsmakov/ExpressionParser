<?php

use PHPUnit\Framework\TestCase;
use App\Service\ExpressionParser\Calculator\RpnCalculator;

class RpnCalculatorTest extends TestCase
{
    public function testCalculateExpressionOnRpnAlgoritm()
    {
        $calculator = new RpnCalculator();

        $this->assertEquals(6, $calculator->calculate('( 8 + 2 * 5 ) / ( 1 + 3 * 2 - 4 ) / 1'));
        $this->assertEquals(70, $calculator->calculate('5*(11+3)'));
        $this->assertEquals(240, $calculator->calculate('12 *5 * (1+3)'));
    }
}