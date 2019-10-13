<?php

namespace App\Service\ExpressionParser\Exceptions;

abstract class AbstractExpressionParserException extends \Exception
{
    /**
     * @var string Additional information about the exception.
     */
    protected $data;

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
}