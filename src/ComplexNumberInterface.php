<?php

namespace Calculator;

interface ComplexNumberInterface
{
    public function setRealPart(float $realPart): ComplexNumberInterface;
    public function getRealPart(): float;
    public function setImaginaryPart(float $imaginaryPart): ComplexNumberInterface;
    public function getImaginaryPart(): float;
}