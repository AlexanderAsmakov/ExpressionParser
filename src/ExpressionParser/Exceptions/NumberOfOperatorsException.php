<?php

namespace ExpressionParser\Exceptions;

class NumberOfOperatorsException extends AbstractExpressionParserException
{
    public function __construct()
    {
        parent::__construct("The number of operators does not correspond to the number of operands.");
    }
}