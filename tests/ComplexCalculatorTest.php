<?php

namespace Calculator\Test;

use Calculator\ComplexCalculator;
use Calculator\Number\ComplexNumber;
use Calculator\Error\LogicError;
use PHPUnit\Framework\TestCase;


/**
 * Test Calculator class, tests operations
 */
class ComplexCalculatorTest extends TestCase
{
    protected ComplexCalculator $calculator;

    /**
     * Sets mocks of operands, setups getters behaviors
     *
     * @param array $data1 Data from dataProvider [real, imaginary]
     * @param array $data2 Data from dataProvider [real, imaginary]
     * @return ComplexNumber[]
     */
    public function setUpOperands($data1, $data2): array
    {
        $operand1 = self::createMock(ComplexNumber::class);
        $operand2 = self::createMock(ComplexNumber::class);

        $operand1->expects(self::any())->method('getRealPart')->willReturn($data1[0]);
        $operand1->expects(self::any())->method('getImaginaryPart')->willReturn($data1[1]);
        $operand2->expects(self::any())->method('getRealPart')->willReturn($data2[0]);
        $operand2->expects(self::any())->method('getImaginaryPart')->willReturn($data2[1]);

        return [$operand1, $operand2];
    }

    /**
     * Setups testing instance
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->calculator = new ComplexCalculator();
    }

    /**
     * Provider for testing add operation
     *
     * @return array
     */
    public function providerAdd(): array
    {
        return [
            [[2.0, 3.0], [1.0, -4.0], [3.0, -1.0],],
            [[0.0, 3.0], [1.0, 0.0], [1.0, 3.0],],
            [[-1.0, 0.0], [0.0, 0.0], [-1.0, 0.0],],
            [[PHP_FLOAT_MAX, 0.0], [-PHP_FLOAT_MAX, 2.0], [0.0, 2.0],],
        ];
    }

    /**
     * Provider for testing subtract operation
     *
     * @return array
     */
    public function providerSubtract(): array
    {
        return [
            [[2.0, 3.0], [1.0, -4.0], [1.0, 7.0],],
            [[0.0, 3.0], [1.0, 0.0], [-1.0, 3.0],],
            [[-1.0, 0.0], [0.0, 0.0], [-1.0, 0.0],],
            [[PHP_FLOAT_MAX, 0.0], [PHP_FLOAT_MAX, 2.0], [0.0, -2.0],],
        ];
    }

    /**
     * Provider for testing multiply operation
     *
     * @return array
     */
    public function providerMultiply(): array
    {
        return [
            [[2.0, 3.0], [1.0, -4.0], [14.0, -5.0],],
            [[0.0, 3.0], [1.0, 0.0], [0.0, 3.0],],
            [[-1.0, 0.0], [0.0, 0.0], [0.0, 0.0],],
            [[PHP_FLOAT_MAX, 0.0], [PHP_FLOAT_MAX, 2.0], [INF, INF],],
        ];
    }

    /**
     * Provider for testing divide operation
     *
     * @return array
     */
    public function providerDivide(): array
    {
        return [
            [[2.0, 3.0], [1.0, -4.0], [-0.5882352941176471, 0.6470588235294118],],
            [[0.0, 3.0], [1.0, 0.0], [0.0, 3.0],],
            [[-1.0, 0.0], [-1.0, 0.0], [1.0, 0.0],],
            [[PHP_FLOAT_MAX, 0.0], [1.0, 2.0], [3.5953862697246315E+307, -INF],],
        ];
    }

    /**
     * Tests add operation
     *
     * @dataProvider providerAdd
     */
    public function testAdd($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->add($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * Tests subtract operation
     *
     * @dataProvider providerSubtract
     */
    public function testSubtract($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->subtract($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * Tests multiply operation
     *
     * @dataProvider providerMultiply
     */
    public function testMultiply($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->multiply($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * Tests divide operation
     *
     * @dataProvider providerDivide
     */
    public function testDivide($data1, $data2, $expected)
    {
        [$operand1, $operand2] = $this->setUpOperands($data1, $data2);

        $result = $this->calculator->divide($operand1, $operand2);

        self::assertSame($expected, [$result->getRealPart(), $result->getImaginaryPart()]);
    }

    /**
     * Tests divide by zero case
     *
     * @return void
     */
    public function testThrowDivideByZero()
    {
        $this->expectException(LogicError::class);

        $operand1 = new ComplexNumber(1, 1);
        $operand2 = new ComplexNumber(0, 0);

        $this->calculator->divide($operand1, $operand2);
    }
}