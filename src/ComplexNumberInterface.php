<?php

namespace Calculator;

interface ComplexNumberInterface
{
    public function setRealPart(int $realPart): void;
    public function getRealPart(): int;
    public function setImaginaryPart(int $imaginaryPart): void;
    public function getImaginaryPart(): int;

    public function __toString(): string;
}