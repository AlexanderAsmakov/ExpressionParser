<?php

namespace ExpressionParser\Exceptions;

class IncorrectOperatorException extends AbstractExpressionParserException
{
    public function __construct($operator)
    {
        parent::__construct("Incorrect operator '$operator'.");

        $this->data = $operator;
    }

    /**
     * Get the unknown operator that was encountered.
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->data;
    }
}