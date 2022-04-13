<?php

namespace Calculator;


use Calculator\Error\LogicError;
use Calculator\Number\ComplexNumber;
use Calculator\Number\ComplexNumberInterface;


/**
 * Main calculator class for arithmetic operations (+, -, *, /) with complex numbers
 */
class ComplexCalculator
{
    /**
     * Adds complex numbers operand1 + operand2, returns result complex number
     *
     * @param ComplexNumberInterface $operand1
     * @param ComplexNumberInterface $operand2
     * @return ComplexNumberInterface
     */
    public function add(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() + $operand2->getRealPart();
        $imaginaryPart = $operand1->getImaginaryPart() + $operand2->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    /**
     * Subtract complex numbers operand1 - operand2, returns result complex number
     *
     * @param ComplexNumberInterface $operand1
     * @param ComplexNumberInterface $operand2
     * @return ComplexNumberInterface
     */
    public function subtract(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() - $operand2->getRealPart();
        $imaginaryPart = $operand1->getImaginaryPart() - $operand2->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    /**
     * Multiply complex numbers operand1 * operand2, returns result complex number
     *
     * @param ComplexNumberInterface $operand1
     * @param ComplexNumberInterface $operand2
     * @return ComplexNumberInterface
     */
    public function multiply(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        $realPart      = $operand1->getRealPart() * $operand2->getRealPart() - $operand1->getImaginaryPart() * $operand2->getImaginaryPart();
        $imaginaryPart = $operand1->getRealPart() * $operand2->getImaginaryPart() + $operand2->getRealPart() * $operand1->getImaginaryPart();

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }

    /**
     * Divide complex numbers operand1 / operand2, returns result complex number
     * Throws LogicError in case of zero operand2, 0 + 0i
     *
     * @param ComplexNumberInterface $operand1
     * @param ComplexNumberInterface $operand2
     *
     * @throws LogicError
     * @return ComplexNumberInterface
     */
    public function divide(ComplexNumberInterface $operand1, ComplexNumberInterface $operand2): ComplexNumberInterface
    {
        $result = new ComplexNumber;

        if ($operand2->getRealPart() == 0 && $operand2->getImaginaryPart() == 0) {
            throw new LogicError('Illegal operation: division by zero; operand2=0+0i');
        }

        $realPart      = ($operand1->getRealPart() * $operand2->getRealPart() + $operand1->getImaginaryPart() * $operand2->getImaginaryPart()) /
            ($operand2->getRealPart() * $operand2->getRealPart() + $operand2->getImaginaryPart() * $operand2->getImaginaryPart());
        $imaginaryPart = ($operand2->getRealPart() * $operand1->getImaginaryPart() - $operand1->getRealPart() * $operand2->getImaginaryPart()) /
            ($operand2->getRealPart() * $operand2->getRealPart() + $operand2->getImaginaryPart() * $operand2->getImaginaryPart());

        $result->setRealPart($realPart);
        $result->setImaginaryPart($imaginaryPart);

        return $result;
    }
}