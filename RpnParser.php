<?php

namespace App\Service\ExpressionParser;

use App\Service\ExpressionParser\Calculator\RpnCalculator;
use App\Service\ExpressionParser\Exceptions\EmptyExpressionException;
use App\Service\ExpressionParser\Exceptions\IncorrectOperatorException;
use App\Service\ExpressionParser\Exceptions\UseSpecialOperatorException;
use App\Service\ExpressionParser\Exceptions\IncorrectExpressionBalanceException;
use App\Service\ExpressionParser\Exceptions\DivisionByZeroException;
use App\Service\ExpressionParser\Exceptions\EnoughDataOnTheStackException;
use App\Service\ExpressionParser\Exceptions\NumberOfOperatorsException;

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