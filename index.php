<?php	
	header('Content-Type: text/plain; charset=UTF-8');
	require_once(dirname(__FILE__) . '/Calc/Calc.php');

	$expression = '1 + 1 * 3 + 3';

	$calculator = new Calc($expression);
	echo 'Expression: ' . $expression . ' = ' . $calculator->calc() . "\n";