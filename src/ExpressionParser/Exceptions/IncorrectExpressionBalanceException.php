<?php

namespace ExpressionParser\Exceptions;

class IncorrectExpressionBalanceException extends AbstractExpressionParserException
{
    public function __construct()
    {
        parent::__construct("Incorrect expression balance.");
    }
}