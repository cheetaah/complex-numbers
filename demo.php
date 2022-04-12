<?php

require_once ( __DIR__ . '/vendor/autoload.php');

use Calculator\ComplexCalculator;
use Calculator\ComplexNumber;

$complexNumber1 = new ComplexNumber(2, 3);
$complexNumber2 = new ComplexNumber(1, -4);
$complexNumber3 = new ComplexNumber(0, 2);
$complexNumber4 = new ComplexNumber(-2, 0);
$complexNumber5 = new ComplexNumber(0, 0);

$calculator = new ComplexCalculator();

$result1 = $calculator->add($complexNumber1, $complexNumber2);


echo $complexNumber1 . ' + ' . $complexNumber2 . ' = ' . $result1;