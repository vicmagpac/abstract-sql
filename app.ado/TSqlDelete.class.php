<?php
/**
* esta classe provê meios para manipulação de uma instrução de DELETE no banco de dados
*/
final class TSqlDelete extends TSqlInstruction
{
	/**
	* retorna a instrução de DELETE em forma de String
	*/
	public function getInstruction()
	{
		// monta a String de delete
		$this->sql = "DELETE FROM {$this->entity}";

		// retorna a clausura WHERE do objeto $this->criteria
		if($this->criteria) {
			$expression = $this->criteria->dump();
			$this->sql .= ' WHERE ' . $expression;
		} 

		return $this->sql;
	}
}