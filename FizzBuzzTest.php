<?php

require_once 'FizzBuzz.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{

    public function dataSequential()
    {
        $fuzz = new FizzBuzz();

        $numbers = array();
        foreach ($fuzz as $number => $value) {
            $numbers[] = $number;
        }

        return array(array($numbers));
    }

    /**
     * Test that the numbers come back sequentially, and completely
     *
     * @dataProvider dataSequential
     */
    public function testSequential($numbers)
    {
        $expectedKeys = range(1, 100);

        $this->assertEquals($expectedKeys, array_values($numbers),
                'Numbers should be sequential, and range from 1 to 100.');
    }

    public function dataReplacement()
    {
        $fuzz = new FizzBuzz();

        $data = array();
        foreach ($fuzz as $number => $value) {
            $data[] = array($number, $value);
        }

        return $data;
    }

    /**
     * @dataProvider dataReplacement
     * @param integer $key The number being tested against
     * @param integer $value The string version (FizzBuzz, etc.)
     */
    public function testFizz($key, $value)
    {
        if ($key % 3 == 0) {
            // Ensure Fizz is first
            $prefix = substr($value, 0, 4);

            $this->assertEquals('Fizz', $prefix,
                    'Numbers which are mod 3 should begin with Fizz');
        }
    }

    /**
     * @dataProvider dataReplacement
     * @param integer $key The number being tested against
     * @param integer $value The string version (FizzBuzz, etc.)
     */
    public function testBuzz($key, $value)
    {
        if ($key % 5 == 0) {
            // Ensure Buzz is last
            $suffix = substr($value, -4);

            $this->assertEquals('Buzz', $suffix,
                    'Numbers which are mod 5 should end with Buzz');
        }
    }

    /**
     * @dataProvider dataReplacement
     * @param integer $key The number being tested against
     * @param integer $value The string version (FizzBuzz, etc.)
     */
    public function testNeither($key, $value)
    {
        if ($key % 5 != 0 && $key % 3 != 0) {
            $this->assertEquals($key, $value,
                    'Numbers which are neither mod 3 nor 5 should equal the key.');
        }
    }

}