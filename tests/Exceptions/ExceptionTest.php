<?php

use App\Service\ExpressionParser\Exceptions\DivisionByZeroException;
use App\Service\ExpressionParser\Exceptions\EmptyExpressionException;
use App\Service\ExpressionParser\Exceptions\EnoughDataOnTheStackException;
use App\Service\ExpressionParser\Exceptions\IncorrectOperatorException;
use App\Service\ExpressionParser\Exceptions\IncorrectExpressionBalanceException;
use App\Service\ExpressionParser\Exceptions\NumberOfOperatorsException;
use App\Service\ExpressionParser\Exceptions\UseSpecialOperatorException;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testDivisionByZeroException()
    {
        try {
            throw new DivisionByZeroException();
        } catch (DivisionByZeroException $e) {
            $this->assertEquals($e->getMessage(), 'Division by zero.');
        }
    }

    public function testEmptyExpressionException()
    {
        try {
            throw new EmptyExpressionException();
        } catch (EmptyExpressionException $e) {
            $this->assertEquals($e->getMessage(), 'Expression is empty.');
        }
    }

    public function testEnoughDataOnTheStackException()
    {
        try {
            throw new EnoughDataOnTheStackException('@');
        } catch (EnoughDataOnTheStackException $e) {
            $this->assertEquals($e->getData(), '@');
        }
    }

    public function testIncorrectOperatorException()
    {
        try {
            throw new IncorrectOperatorException('{');
        } catch (IncorrectOperatorException $e) {
            $this->assertEquals($e->getData(), '{');
        }
    }

    public function testIncorrectExpressionBalanceException()
    {
        try {
            throw new IncorrectExpressionBalanceException();
        } catch (IncorrectExpressionBalanceException $e) {
            $this->assertEquals($e->getMessage(), 'Incorrect expression balance.');
        }
    }

    public function testNumberOfOperatorsException()
    {
        try {
            throw new NumberOfOperatorsException();
        } catch (NumberOfOperatorsException $e) {
            $this->assertEquals($e->getMessage(), 'The number of operators does not correspond to the number of operands.');
        }
    }

    public function testUseSpecialOperatorException()
    {
        try {
            throw new UseSpecialOperatorException();
        } catch (UseSpecialOperatorException $e) {
            $this->assertEquals($e->getMessage(), "Dont use special operator '|' in expression.");
        }
    }
}