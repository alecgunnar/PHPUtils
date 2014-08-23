<?php

use PHPUtils\Generator\StringGenerator;

class StringGeneratorTests extends PHPUnit_Framework_TestCase {
    public function testGenerateRandomString() {
        $length = 20;
        $string = StringGenerator::random(20);

        $this->assertTrue(is_string($string) && (strlen($string) == $length));
    }

    public function testGenerateRandomAlphaString() {
        $this->assertTrue(ctype_alpha(StringGenerator::random(20, StringGenerator::ALPHA)));
    }

    public function testGenerateRandomNumericString() {
        $string = StringGenerator::random(20, StringGenerator::NUMERIC);

        $this->assertTrue(is_string($string) && is_numeric($string));
    }

    public function testGenerateRandomAlphaNumericString() {
        $this->assertTrue(ctype_alnum(StringGenerator::random(20, StringGenerator::ALPHANUMERIC)));
    }

    public function testGenerateRandomSpecialString() {
        $string = StringGenerator::random(20, StringGenerator::SPECIAL);

        $allSpecial = true;

        for($i = 0; $i < strlen($string); $i++) {
            if(ctype_alnum($string[$i])) {
                $allSpecial = false;

                break;
            }
        }

        $this->assertTrue($allSpecial);
    }

    /**
     * @expectedException Exception
     */
    public function testGeneratorThrowsExceptionWithInvalidType() {
        StringGenerator::random(20, 1000);
    }
}