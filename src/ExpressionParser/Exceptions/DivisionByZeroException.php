<?php

namespace ExpressionParser\Exceptions;

class DivisionByZeroException extends AbstractExpressionParserException
{
    public function __construct()
    {
        parent::__construct("Division by zero.");
    }
}