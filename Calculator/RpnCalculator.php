<?php

namespace App\Service\ExpressionParser\Calculator;

use App\Service\ExpressionParser\Converter\RpnConverter;

class RpnCalculator implements CalculatorInterface
{
    /**
     * @var RpnConverter
     */
    protected $converter;

    public function __construct()
    {
        $this->converter = new RpnConverter();
    }

    /**
     * @param string $text
     *
     * @return int|float
     *
     * @throws \Exception
     */
    public function calculate(string $text)
    {
        $stack = [];
        $rpnExpression = $this->converter->convert($text);
        $tokens = explode(" ", $rpnExpression);

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($stack, $token);
            } else {
                if (count($stack) < 2) {
                    throw new \Exception("Calculate exception: There is not enough data on the stack for the operation '$token'.");
                }

                $b = array_pop($stack);
                $a = array_pop($stack);
                $result = null;

                switch ($token) {
                    case $this->converter::MULTIPLICATION_OPERATOR:
                        $result = $a * $b;
                        break;
                    case $this->converter::DIVISION_OPERATOR:
                        if ($b == 0) {
                            throw new \Exception("Calculate exception: Division by zero.");
                        }
                        $result = $a / $b;
                        break;
                    case $this->converter::PLUS_OPERATOR:
                        $result = $a + $b;
                        break;
                    case $this->converter::MINUS_OPERATOR:
                        $result = $a - $b;
                        break;
                    default:
                        break;

                }

                array_push($stack, $result);
            }
        }

        if (count($stack) > 1) {
            throw new \Exception("Calculate exception: The number of operators does not correspond to the number of operands.");
        }

        return array_pop($stack);
    }
}