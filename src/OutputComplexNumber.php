<?php

namespace Calculator;

class OutputComplexNumber
{
    protected ComplexNumberInterface $complexNumber;

    public function __construct()
    {
    }

    public function setComplexNumber(ComplexNumberInterface $complexNumber): OutputComplexNumber
    {
        $this->complexNumber = $complexNumber;

        return $this;
    }

    public function __invoke(...$arguments): OutputComplexNumber
    {
        if (isset($arguments[0]) && $arguments[0] instanceof ComplexNumberInterface) {
            $this->setComplexNumber($arguments[0]);
        }
        return $this;
    }

    public function __toString(): string
    {
        $complexNumber = $this->complexNumber;

        $realPartString = $complexNumber->getRealPart() == 0 ? '' : $complexNumber->getRealPart();

        switch ($complexNumber->getImaginaryPart()) {
            case 0:
                $imaginaryPartString = '';
                break;
            case 1:
                $imaginaryPartString = $complexNumber->getRealPart() != 0 ? '+i' : 'i';
                break;
            case -1:
                $imaginaryPartString = '-i';
                break;
            default:
                $imaginaryPartString = ($complexNumber->getImaginaryPart() > 0 ? ($complexNumber->getRealPart() != 0 ? '+' : '') : '') .
                    $complexNumber->getImaginaryPart() . 'i';
                break;
        }

        return sprintf(
            '%s%s',
            $realPartString,
            $imaginaryPartString
        );
    }
}