<?php

require_once 'FizzBuzz.php';

$fizzy = new FizzBuzz();

foreach ($fizzy as $number => $value) {
    echo $value . "\n";
}