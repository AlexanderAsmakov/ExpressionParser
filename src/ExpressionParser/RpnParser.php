<?php

namespace ExpressionParser;

use ExpressionParser\Calculator\RpnCalculator;
use ExpressionParser\Exceptions\EmptyExpressionException;
use ExpressionParser\Exceptions\IncorrectOperatorException;
use ExpressionParser\Exceptions\UseSpecialOperatorException;
use ExpressionParser\Exceptions\IncorrectExpressionBalanceException;
use ExpressionParser\Exceptions\DivisionByZeroException;
use ExpressionParser\Exceptions\EnoughDataOnTheStackException;
use ExpressionParser\Exceptions\NumberOfOperatorsException;

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
     * @throws EmptyExpressionException
     * @throws UseSpecialOperatorException
     * @throws IncorrectExpressionBalanceException
     * @throws IncorrectOperatorException
     * @throws DivisionByZeroException
     * @throws NumberOfOperatorsException
     * @throws EnoughDataOnTheStackException
     */
    public function parse(string $text)
    {
        return $this->calculator->calculate($text);
    }
}