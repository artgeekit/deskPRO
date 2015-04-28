<?php
require_once(dirname(__FILE__) . '/../Calc/Calc.php');

/**
 * Just a very basic tests, to check if all simple operations works fine
 */
class CalcTest extends PHPUnit_Framework_TestCase
{
	public function testAddition()
	{
		$expression = '2+3+47'; // Expecting 52
		$calc = new Calc();

		$calc->setExpression($expression);
		$this->assertSame($calc->Calc(), 52);
	}
	
	public function testSubtraction()
	{
		$expression = '30-11'; // Expecting 19
		$calc = new Calc();

		$calc->setExpression($expression);
		$this->assertSame($calc->Calc(), 19);
	}

	public function testDivision()
	{
		$expression = '30 / 3'; // Expecting 10
		$calc = new Calc();

		$calc->setExpression($expression);
		$this->assertSame($calc->Calc(), 10);
	}

	public function testMultiplication()
	{
		$expression = '2 * 7'; // Expecting 14
		$calc = new Calc();

		$calc->setExpression($expression);
		$this->assertSame($calc->Calc(), 14);
	}

	public function testComplexExpression()
	{
		$expressions = array(
			'1 + 1 * 3 + 3', 			// Expecting 7 (Was requsted in the task)
			'1 + 1 * 3 + 3 - 4 / 2',    // Expecting 5
			);
		$calc = new Calc();

		$calc->setExpression($expressions[0]);
		$this->assertSame($calc->Calc(), 7);

		$calc->setExpression($expressions[1]);
		$this->assertSame($calc->Calc(), 5);
	}
}