<?php

namespace App\Service\ExpressionParser\Exceptions;

class EnoughDataOnTheStackException extends AbstractExpressionParserException
{
    public function __construct($operator)
    {
        parent::__construct("There is not enough data on the stack for the operation '$operator'.");

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