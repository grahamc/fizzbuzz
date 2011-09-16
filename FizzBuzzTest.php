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

        $this->assertEquals($expectedKeys, array_values($numbers));
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

            $this->assertEquals('Fizz', $prefix);
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

            $this->assertEquals('Buzz', $suffix);
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
            $this->assertEquals($key, $value);
        }
    }

}