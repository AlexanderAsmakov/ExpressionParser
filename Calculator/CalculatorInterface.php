<?php

namespace App\Service\ExpressionParser\Calculator;

interface CalculatorInterface
{
    /**
     * @param string $text
     *
     * @return int|float
     *
     * @throws \Exception
     */
    public function calculate(string $text);
}