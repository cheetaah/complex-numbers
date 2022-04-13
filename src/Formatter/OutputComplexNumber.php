<?php

namespace Calculator\Formatter;


use Calculator\ComplexNumberInterface;

/**
 * Formatter number object to string
 */
class OutputComplexNumber
{
    protected ComplexNumberInterface $complexNumber;

    public function __construct()
    {
    }

    /**
     * Sets wrapped object
     *
     * @param ComplexNumberInterface $complexNumber
     * @return OutputComplexNumber
     */
    public function setComplexNumber(ComplexNumberInterface $complexNumber): OutputComplexNumber
    {
        $this->complexNumber = $complexNumber;

        return $this;
    }

    /**
     * Invokes formatter like function $formatter($number_object)
     *
     * @param  ...$arguments
     * @return OutputComplexNumber
     *
     */
    public function __invoke(...$arguments): OutputComplexNumber
    {
        if (isset($arguments[0]) && ($arguments[0] instanceof ComplexNumberInterface)) {
            $this->setComplexNumber($arguments[0]);
        }
        return $this;
    }

    /**
     * Casts formatter in string calls
     *
     * @return string
     */
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