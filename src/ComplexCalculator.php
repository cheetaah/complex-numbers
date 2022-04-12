<?php

namespace Calculator;

use Calculator\ComplexNumber;

class ComplexCalculator
{
    public function add(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() + $operand2->getRealPart();
        $imaginaryPart = $operand1->getImaginaryPart() + $operand2->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    public function subtract(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() - $operand2->getRealPart();
        $imaginaryPart = $operand1->getImaginaryPart() - $operand2->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    public function multiply(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() * $operand2->getRealPart() - $operand1->getImaginaryPart() * $operand2->getImaginaryPart();
        $imaginaryPart = $operand1->getRealPart() * $operand2->getImaginaryPart() + $operand2->getRealPart() * $operand1->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    public function divide(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = ($operand1->getRealPart() * $operand2->getRealPart() + $operand1->getImaginaryPart() * $operand2->getImaginaryPart()) /
            ($operand2->getRealPart() * $operand2->getRealPart() + $operand2->getImaginaryPart() * $operand2->getImaginaryPart());
        $imaginaryPart = ($operand2->getRealPart() * $operand1->getImaginaryPart() - $operand1->getRealPart() * $operand2->getImaginaryPart()) /
            ($operand2->getRealPart() * $operand2->getRealPart() + $operand2->getImaginaryPart() * $operand2->getImaginaryPart());

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }
}