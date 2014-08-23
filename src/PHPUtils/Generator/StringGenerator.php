<?php

/**
 * Provides methods for generating different types of strings.
 *
 * @author Alec Carpenter <gunnar94@me.com>
 */

namespace PHPUtils\Generator;

class StringGenerator {
    /**
     * Instructs to generate random string of alpha characters
     *
     * @var int
     */
    const ALPHA = 101;

    /**
     * Instructs to generate random string of numeric characters
     *
     * @var int
     */
    const NUMERIC = 203;

    /**
     * Instructs to generate random string of alpha numeric characters
     *
     * @var int
     */
    const ALPHANUMERIC = 305;

    /**
     * Instructs to generate random string of special characters
     *
     * @var int
     */
    const SPECIAL = 407;

    /**
     * Generates a random string
     *
     * @param int $length
     * @param int $type=0
     */
    public static function random($length, $type=0) {
        $alphaUpper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphaLower = 'abcdefghijklmnopqrstuvwxyz';
        $numeric    = '1234567890';
        $special    = '!@#$%^&*()_+-={}|[]\:";\'<>?,./';

        $possibilities = '';

        if($type) {
            switch($type) {
                case self::ALPHANUMERIC:
                    $possibilities = $numeric;
                case self::ALPHA:
                    $possibilities .= $alphaUpper . $alphaLower;
                    break;
                case self::NUMERIC:
                    $possibilities = $numeric;
                    break;
                case self::SPECIAL:
                    $possibilities = $special;
                    break;
                default:
                    throw new \Exception('Invalid random string type.');
            }
        } else {
            $possibilities = $alphaUpper . $alphaLower . $numeric . $special;
        }

        $randomStr        = '';
        $numPossibilities = strlen($possibilities);

        while(strlen($randomStr) < $length) {
            $randomStr .= $possibilities[rand(0, $numPossibilities - 1)];
        }

        return $randomStr;
    }
}