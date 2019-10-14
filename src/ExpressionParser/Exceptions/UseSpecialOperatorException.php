<?php

namespace ExpressionParser\Exceptions;

class UseSpecialOperatorException extends AbstractExpressionParserException
{
    public function __construct()
    {
        parent::__construct("Dont use special operator '|' in expression.");
    }
}