<?php
/**
* Classe TFilter
* Esta classe provê uma interface para definição de filtros de seleção
*/
class TFilter extends TExpression
{
	private $variable;	// variável 
	private $operator; 	// operador
	private $value; 	// valor

	/**
	* método __construct()
	* Instância um novo filtro
	* @param $variable = variavel
	* @param $operator = operador (<,>)
	* @param $value = valor a ser comparado
	*/
	public function __construct($variable, $operator, $value)
	{
		//armazena as propriedades
		$this->variable = $variable;
		$this->operator = $operator;
		//transforma o valor de acordo com certas regras 
		//antes de atribuir a propriedade $this->value
		$this->value = $this->transform($value);
	}

	/**
	* metodo transform()
	* recebe um valor e faz modificações necessarias 
	* para ele ser interpretado pelo banco de dados
	* podendo ser um integer/string/boolean ou array
	* @param $value = valor a ser transformado 
	*/
	private function transform($value)
	{
		//caso seja um array
		if(is_array($value)) {
			//percorre os valores
			foreach($value as $x) {
				//se for um inteiro
				if(is_integer($x)) {
					$foo[] = $x;
				}else if(is_string($x)){
					//se for um string adiciona aspas
					$foo[] = "'".$x."'";
				}
			}
			//converte o array em string separada por ','
			$result = '(' . implode(',', $foo) . ')';
		}else if(is_string($value)) {
			//adiciona aspas
			$result = "'" .  $value . "'";
		}else if(is_null($value)) {
			//caso seja nulo, armazena NULL
			$return = 'NULL';
		}else if(is_bool($value)) {
			//caso seja booleano, armazena TRUE ou FALSE
			$result = $value ? 'TRUE' : 'FALSE';
		}else{
			$result = $value;
		}

		return $result;
	}

	/**
	* método dump()
	* retorna o filtro em forma de expressão
	*/
	public function dump()
	{
		return "{$this->variable} {$this->operator} {$this->value}";
	}
}