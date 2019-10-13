<?php

namespace App\Service\ExpressionParser;

use App\Service\ExpressionParser\Calculator\RpnCalculator;

class RpnParser extends AbstractParser
{
    /**
     * @var RpnCalculator
     */
    protected $calculator;

    public function __construct()
    {
        $this->calculator = new RpnCalculator();
    }

    /**
     * @param string $text
     *
     * @return int|float
     *
     * @throws \Exception
     */
    public function parse(string $text)
    {
        return $this->calculator->calculate($text);
    }
}