<?php

use PHPUnit\Framework\TestCase;
use App\Service\ExpressionParser\Converter\RpnConverter;

class RpnConverterTest extends TestCase
{
    public function testConvertTextToRpn()
    {
        $converter = new RpnConverter();

        $this->assertEquals('8 2 5 * + 1 3 2 * + 4 - /', $converter->convert('( 8 + 2 * 5 ) / ( 1 + 3 * 2 - 4 )'));
        $this->assertEquals('1 2 + 4 * 3 +', $converter->convert('(1+ 2 ) * 4+ 3'));
    }
}