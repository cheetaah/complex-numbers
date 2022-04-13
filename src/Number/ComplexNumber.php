<?php

namespace Calculator\Number;


/**
 * Class for complex number logic
 */
class ComplexNumber implements ComplexNumberInterface
{
    /**
     * @var float|int real part of complex number
     */
    protected float $realPart;

    /**
     * @var float|int imaginary part of complex number
     */
    protected float $imaginaryPart;

    /**
     * Gets new instance of ComplexNumber
     *
     * @param float $realPart
     * @param float $imaginaryPart
     */
    public function __construct(float $realPart = 0, float $imaginaryPart = 0)
    {
        $this->realPart      = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * Gets real part of complex number
     *
     * @return float
     */
    public function getRealPart(): float
    {
        return $this->realPart;
    }

    /**
     * Sets real part of complex number and has chain-call effect for calling setters in chain
     *
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
     * Gets imaginary part of complex number
     *
     * @return float
     */
    public function getImaginaryPart(): float
    {
        return $this->imaginaryPart;
    }

    /**
     * Sets imaginary part of complex number and has chain-call effect for calling setters in chain
     *
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