<?php

use PHPUtils\String\Generator;

class StringGeneratorTests extends PHPUnit_Framework_TestCase {
    public function testGenerateRandomString() {
        $length = 20;
        $string = Generator::random(20);

        $this->assertTrue(is_string($string) && (strlen($string) == $length));
    }

    public function testGenerateRandomAlphaString() {
        $this->assertTrue(ctype_alpha(Generator::random(20, Generator::ALPHA)));
    }

    public function testGenerateRandomNumericString() {
        $string = Generator::random(20, Generator::NUMERIC);

        $this->assertTrue(is_string($string) && is_numeric($string));
    }

    public function testGenerateRandomAlphaNumericString() {
        $this->assertTrue(ctype_alnum(Generator::random(20, Generator::ALPHANUMERIC)));
    }

    public function testGenerateRandomSpecialString() {
        $string = Generator::random(20, GENERATOR::SPECIAL);

        $allSpecial = true;

        for($i = 0; $i < strlen($string); $i++) {
            if(ctype_alnum($string[$i])) {
                $allSpecial = false;

                break;
            }
        }

        $this->assertTrue($allSpecial);
    }
}