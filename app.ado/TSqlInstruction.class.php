<?php
/**
* classe TSqlInstruction
* esta classe provê os metodos em comum entre todas as instruções
* SQL (SELECT, INSERT, DELETE, UPDATE)
*/
abstract class TSqlInstruction
{	
	protected $sql;		//armazena a instrução sql
	protected $criteria;	//armazena o objeto critério
    protected $entity;

	/**
	* método setEntity()
	* define o nome da entidade (tabela) manipulada pela instrução sql
	* @param $entity = tabela
	*/
	final public function setEntity($entity)
	{
		$this->entity = $entity;
	}

	/**
	* método getEntity()
	* retorna o nome da entidade
	*/
	final public function getEntity()
	{
		return $this->entity;
	}

	/**
	* método setCriteria()
	* define um critério de seleção dos dados através da composição de um objeto
	* do tipo TCriteria, que oferece uma interface para definição de criterios
	* @param $criteria = objeto do tipo TCriteria
	*/
	public function setCriteria(TCriteria $criteria)
	{
		$this->criteria = $criteria;
	}

	/**
	* método getInstruction()
	* declarando-o como <abstract> obrigamos sua declaração nas classes filhas, uma vez
	* que seu comportamento será distinto em cada uma delas, configurando polimosfismo 
	*/
	abstract function getInstruction();
}