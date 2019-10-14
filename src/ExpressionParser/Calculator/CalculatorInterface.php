<?php

namespace ExpressionParser\Calculator;

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