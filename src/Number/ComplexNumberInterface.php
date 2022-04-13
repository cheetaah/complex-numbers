<?php

namespace Calculator\Number;

/**
 * Interface for complex number
 */
interface ComplexNumberInterface
{
    public function setRealPart(float $realPart): ComplexNumberInterface;
    public function getRealPart(): float;
    public function setImaginaryPart(float $imaginaryPart): ComplexNumberInterface;
    public function getImaginaryPart(): float;
}