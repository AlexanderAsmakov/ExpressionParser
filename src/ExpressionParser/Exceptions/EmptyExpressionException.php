<?php

namespace ExpressionParser\Exceptions;

class EmptyExpressionException extends AbstractExpressionParserException
{
    public function __construct()
    {
        parent::__construct("Expression is empty.");
    }
}