<?php

namespace Calculator\Test;

use Calculator\ComplexCalculator;
use Calculator\ComplexNumber;
use Calculator\LogicError;
use PHPUnit\Framework\TestCase;

class ComplexCalculatorTest extends TestCase
{
    protected ComplexCalculator $calculator;

    /**
     * @param $data1
     * @param $data2
     * @return ComplexNumber[]
     */
    public function setUpOperands($data1, $data2): array
    {
        $operand1 = new ComplexNumber($data1[0], $data1[1]);
        $operand2 = new ComplexNumber($data2[0], $data2[1]);

        return [$operand1, $operand2];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->calculator = new ComplexCalculator();
    }

    public function providerAdd(): array
    {
        return [
            [[2, 3], [1, -4], [3.0, -1.0],],
            [[0, 3], [1, 0], [1.0, 3.0],],
            [[-1, 0], [0, 0], [-1.0, 0.0],],
            [[PHP_INT_MAX, 0], [PHP_INT_MIN, 2], [0.0, 2.0],],
        ];
    }

    public function providerSubtract(): array
    {
        return [
            [[2, 3], [1, -4], [1.0, 7.0],],
            [[0, 3], [1, 0], [-1.0, 3.0],],
            [[-1, 0], [0, 0], [-1.0, 0.0],],
            [[PHP_INT_MAX, 0], [PHP_INT_MIN, 2], [PHP_INT_MAX-PHP_INT_MIN, -2.0],],
        ];
    }

    public function providerMultiply(): array
    {
        return [
            [[2, 3], [1, -4], [14.0, -5.0],],
            [[0, 3], [1, 0], [0.0, 3.0],],
            [[-1, 0], [0, 0], [0.0, 0.0],],
            [[PHP_INT_MAX, 0], [PHP_INT_MIN, 2], [-8.507059173023462E+37, 1.8446744073709552E+19],],
        ];
    }

    public function providerDivide(): array
    {
        return [
            [[2, 3], [1, -4], [-0.5882352941176471, 0.6470588235294118],],
            [[0, 3], [1, 0], [0.0, 3.0],],
            [[-1, 0], [-1, 0], [1.0, 0.0],],
            [[PHP_INT_MAX, 0], [PHP_INT_MIN, 2], [-1.0, -2.168404344971009E-19],],
        ];
    }

    /**
     * @dataProvider providerAdd
     */
    public function testAdd($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->add($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * @dataProvider providerSubtract
     */
    public function testSubtract($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->subtract($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * @dataProvider providerMultiply
     */
    public function testMultiply($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->multiply($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * @dataProvider providerDivide
     */
    public function testDivide($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->divide($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    public function testThrowDivideByZero()
    {
        $this->expectException(LogicError::class);

        $operand1 = new ComplexNumber(1, 1);
        $operand2 = new ComplexNumber(0, 0);

        $this->calculator->divide($operand1, $operand2);
    }

}