<?php

namespace App\Service\ExpressionParser\Converter;

class RpnConverter implements ConverterInterface
{
    const MINUS_OPERATOR = "-";
    const PLUS_OPERATOR = "+";
    const MULTIPLICATION_OPERATOR = "*";
    const DIVISION_OPERATOR = "/";
    const OPEN_PARENTHESIS_OPERATOR = "(";
    const CLOSE_PARENTHESIS_OPERATOR = ")";
    const START_END_EXPRESSION_OPERATOR = "|";

    const OPERATORS_PRIORITY = [
        self::OPEN_PARENTHESIS_OPERATOR => 1,
        self::CLOSE_PARENTHESIS_OPERATOR => 1,
        self::MINUS_OPERATOR => 2,
        self::PLUS_OPERATOR => 2,
        self::MULTIPLICATION_OPERATOR => 3,
        self::DIVISION_OPERATOR => 3,
    ];

    /**
     * @param string $text
     *
     * @return string
     *
     * @throws \Exception
     */
    public function convert(string $text)
    {
        $stack = [];
        $convertedStack = [];

        if (empty($text)) {
            throw new \Exception("Convert exception: Expression is empty.");
        }

        if (preg_match("/\|/", $text)) {
            throw new \Exception("Convert exception: Incorrect operator '|'");
        }

        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace("/\s/", "", $text);
        $text = str_replace(",", ".", $text);

        $tokens = preg_split(
            '#([+\-*/()]|\d+)#',
            $text,
            -1,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );

        $tokens[] = self::START_END_EXPRESSION_OPERATOR;
        $stack[] = self::START_END_EXPRESSION_OPERATOR;

        foreach ($tokens as $token) {
            if (preg_match("/[0-9]/", $token)) {
                $convertedStack[] = $token;
            } elseif (preg_match("/[\+\-\*\/]/", $token)) {
                for ($j = count($stack) - 1; $j >= 0; --$j) {
                    if (in_array($stack[$j], [self::OPEN_PARENTHESIS_OPERATOR, self::START_END_EXPRESSION_OPERATOR])) {
                        $stack[] = $token;
                        break;
                    }

                    if (preg_match("/[\+\-\*\/]/", $stack[$j])) {
                        if (self::OPERATORS_PRIORITY[$token] > self::OPERATORS_PRIORITY[$stack[$j]]) {
                            $stack[] = $token;
                            break;
                        }
                        $convertedStack[] = $stack[$j];
                        unset($stack[$j]);
                    }
                }

                $stack = array_values($stack);
            } elseif ($token === self::OPEN_PARENTHESIS_OPERATOR) {
                $stack[] = $token;
            } elseif ($token === self::CLOSE_PARENTHESIS_OPERATOR) {
                if (!array_search(self::OPEN_PARENTHESIS_OPERATOR, $stack)) {
                    throw new \Exception('Convert exception: Incorrect expression balance.');
                }

                for ($j = count($stack) - 1; $j >= 0; --$j) {
                    if (!in_array($stack[$j], [self::OPEN_PARENTHESIS_OPERATOR, self::START_END_EXPRESSION_OPERATOR])) {
                        $convertedStack[] = array_pop($stack);
                    } elseif($stack[$j] !== self::START_END_EXPRESSION_OPERATOR) {
                        array_pop($stack);
                        break;
                    }
                }
            } elseif ($token === self::START_END_EXPRESSION_OPERATOR) {
                for ($j = count($stack) - 1; $j >= 0; --$j) {
                    if (preg_match("/[\+\-\*\/]/", $stack[$j])) {
                        $convertedStack[] = array_pop($stack);
                    }
                }

                if (count($stack) > 1) {
                    throw new \Exception('Convert exception: Incorrect expression balance.');
                }
            } else {
                throw new \Exception("Convert exception: Incorrect operator '$token'.");
            }
        }

        return implode(" ", $convertedStack);
    }
}