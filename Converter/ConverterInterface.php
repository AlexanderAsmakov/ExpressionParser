<?php

namespace App\Service\ExpressionParser\Converter;

interface ConverterInterface {

    /**
     * @param string $text
     *
     * @return string
     *
     * @throws \Exception
     */
    public function convert(string $text);
}