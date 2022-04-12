<?php

namespace Calculator;

class ComplexNumber implements ComplexNumberInterface
{
    protected float $realPart;
    protected float $imaginaryPart;

    public function __construct(float $realPart = 0, float $imaginaryPart = 0)
    {
        $this->realPart      = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * @return float
     */
    public function getRealPart(): float
    {
        return $this->realPart;
    }

    /**
     * @param float $realPart
     *
     * @return ComplexNumberInterface
     */
    public function setRealPart(float $realPart): ComplexNumberInterface
    {
        $this->realPart = $realPart;

        return $this;
    }

    /**
     * @return float
     */
    public function getImaginaryPart(): float
    {
        return $this->imaginaryPart;
    }

    /**
     * @param float $imaginaryPart
     *
     * @return ComplexNumberInterface
     */
    public function setImaginaryPart(float $imaginaryPart): ComplexNumberInterface
    {
        $this->imaginaryPart = $imaginaryPart;

        return $this;
    }
}