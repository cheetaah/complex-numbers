<?php

require_once ( __DIR__ . '/vendor/autoload.php');

use Calculator\ComplexCalculator;
use Calculator\Number\ComplexNumber;
use Calculator\Formatter\OutputComplexNumber;

$complexNumber1 = new ComplexNumber(2, 3);
$complexNumber2 = new ComplexNumber(1, -4);
$complexNumber3 = new ComplexNumber(0, 2);
$complexNumber4 = new ComplexNumber(-2, 0);
$complexNumber5 = new ComplexNumber(0, 0);

$calculator = new ComplexCalculator();
$output     = new OutputComplexNumber();

$result1 = $calculator->add($complexNumber1, $complexNumber2);
$result2 = $calculator->subtract($complexNumber2, $complexNumber4);
$result3 = $calculator->multiply($complexNumber3, $complexNumber1);
$result4 = $calculator->divide($complexNumber4, $complexNumber3);

echo $output($complexNumber1) . ' + ' . $output($complexNumber2) . ' = ' . $output($result1) . "\n";
echo $output($complexNumber2) . ' - ' . $output($complexNumber4) . ' = ' . $output($result2) . "\n";
echo $output($complexNumber3) . ' * ' . $output($complexNumber1) . ' = ' . $output($result3) . "\n";
echo $output($complexNumber4) . ' / ' . $output($complexNumber3) . ' = ' . $output($result4) . "\n";

/**
 * TODO:
 * 1. import formatter parser (instance complex number object from string like "Re + Im i"
 * 2. improve operands classes
 * 3. improve operations
 * 4. upgrade calculator class
 */