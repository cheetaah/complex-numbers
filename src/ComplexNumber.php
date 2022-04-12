<?php

namespace Calculator;

class ComplexNumber implements ComplexNumberInterface
{
    protected int $realPart;
    protected int $imaginaryPart;

    public function __construct(int $realPart = 0, int $imaginaryPart = 0)
    {
        $this->realPart      = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * @return int
     */
    public function getRealPart(): int
    {
        return $this->realPart;
    }

    /**
     * @param int $realPart
     */
    public function setRealPart(int $realPart): void
    {
        $this->realPart = $realPart;
    }

    /**
     * @return int
     */
    public function getImaginaryPart(): int
    {
        return $this->imaginaryPart;
    }

    /**
     * @param int $imaginaryPart
     */
    public function setImaginaryPart(int $imaginaryPart): void
    {
        $this->imaginaryPart = $imaginaryPart;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s%s%s',
            $this->realPart,
            $this->imaginaryPart > 0 ? '+' : '',
            $this->imaginaryPart != 0 ? $this->imaginaryPart . 'i' : '',
        );
    }
}