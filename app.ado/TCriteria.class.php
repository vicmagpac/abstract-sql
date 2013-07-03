<?php
/**
* classe TCriteria
* esta classe provê uma interface utilizada para definição de critérios
*/
class TCriteria extends TExpression
{
	private $expressions; 	// armazena a lista de expressões
	private $operators; 	// armazena a lista de operadores
	private $properties; 	// propriedades do critério

	/**
	* método add()
	* adiciona uma expressão ao criterio
	* @param $expression = expressão (objeto TExpression)
	* @param $operator = operador lógico de comparação
	*/
	public function add(TExpression $expression, $operator = self::AND_OPERATOR)
	{
		//na primeira vez, não precisamos de operador lógico para concatenar
		if(empty($this->expressions)) {
			unset($operator);
		}

		//agrega o resultado a expressão à lista de expressões
		$this->expressions[] = $expression;
		$this->operators[] = $operator;
	}

	/**
	* método dump()
	* retorna a expressão final
	*/
	public function dump()
	{
		//concatena a lista de expresões
		if(is_array($this->expressions)) {
			foreach($this->expressions as $i => $expression) {
				$operator = $this->operators[$i];
				// concatena o operador com a respectiva expressão
				$result .= $operator . $expression->dump() . ' ';
			}

			$result = trim($result);
			return "({$result})";
		}
	}

	/**
	* método setProperty()
	* define o valor de uma propriedade
	* @param $property = propriedade
	* @param $value = valor
	*/
	public function setProperty($property, $value)
	{
		$this->properties[$property] = $value;
	}

	/**
	* método getProperty()
	* retorna o valor de uma propriedade
	* @param $property = propriedade
	*/
	public function getProperty($property)
	{
		return $this->properties[$property];
	}
}
