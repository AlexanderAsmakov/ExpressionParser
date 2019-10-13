<?php

namespace App\Service\ExpressionParser;

abstract class AbstractParser
{
    /**
     * @param string $text
     *
     * @return int|float
     *
     * @throws \Exception
     */
    abstract public function parse(string $text);
}