<?php
	/**
	* @author Arthur Frank <frank.artur0303@gmail.com>
	* @date 27/04/2015
	*/
	
	class Calc
	{
		private $expression;

		public function __construct($expression = false)
		{
			if($expression) {
				$this->expression = $expression;
			}
		}

		/**
		 * Method to calculate simple expressions with for main actions [+,-,/,*]
		 * @return [int] [Result Number]
		 */
		public function calc() {
			$arr = array();

			preg_match_all('/[\+\-\*\/]+/siU', $this->expression, $exp);
			preg_match_all('/\b(\d+)\b/siU', $this->expression, $num);
			
			foreach ($exp[0] as $key => $symb) {
				$arr[] = array($num[0][$key], $symb);
			}
			$arr[] = array($num[0][count($num[0]) - 1], false);

			// Handle Multiplication and Division.
			foreach ($arr as $k => $v) {
				switch ($v[1]) {
					case '*':
						$arr[$k + 1][0] = $arr[$k][0] * $arr[$k + 1][0];
						unset($arr[$k]);
						break;
					
					case '/':
						$arr[$k + 1][0] = $arr[$k][0] / $arr[$k + 1][0];
						unset($arr[$k]);
						break;
				}
			}
			$arr = array_values($arr); // Reset first level keys, to handle numbers priority properly

			// Handle Addition and Substraction
			foreach ($arr as $k => $v) {
				switch ($v[1]) {
					case '-':
						$arr[$k + 1][0] = $arr[$k][0] - $arr[$k + 1][0];
						unset($arr[$k]);
						break;
					
					case '+':
						$arr[$k + 1][0] = $arr[$k][0] + $arr[$k + 1][0];
						unset($arr[$k]);
						break;
				}
			}

			return array_values($arr)[0][0];
		}

		/**
		 * Simple method, to change expression
		 * @param [string] $expression [Contains simple math expression, like "1+1-1*1/1"]
		 */
		public function setExpression($expression)
		{
			if (!empty($expression)) {
				$this->expression = $expression;
			}
		}
	}