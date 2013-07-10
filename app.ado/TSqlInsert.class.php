<?php
/**
 * classe TSqlInsert
 * Esta classe provê meios para manipulação de uma instrução de INSERT no banco de dados
 */
final class TSqlInsert extends TSqlInstruction
{
    /**
     * método setRowData()
     * Atribui valores à determinadas colunas do banco de dados que serão inseridas
     * @param $column = coluna da tabela
     * @param #value = valor a ser inserido
     */
    public function setRowData($column, $value)
    {
        //monta um array indexado pelo nome da coluna
        if(is_string($value)) {
            //adiciona \ as aspas
            $value = addslashes($value);
            //caso seja uma string
            $this->columnValues[$column] = "'$value'";
        }else if(is_bool($value)) {
            //caso seja um boolean 
            $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
        }else if(isset($value)) {
            //caso seja outro tipo de dado 
            $this->columnValues[$column] = $value;
        }else {
            //caso seja NULL
            $this->columnValues[$column] = "NULL";
        }
    }
    
    /**
     * método setCriteria()
     * não existe no contexto desta classe, logo irá lançar um erro se for executado
     */
    public function setCriteria(TCriteria $criteria)
    {
        //lança um erro
        throw new Exception("Cannot call setCriteria from " . __CLASS__);
    }
    
    /**
     * método getInstruction()
     * retorna a instrução de INSERT de forma de string
     */
    public function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        // monta uma string contendo os nomes de colunas
        $columns = implode(', ', array_keys($this->columnValues));
        // monta uma string contendo os valores
        $values = implode(', ', array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= " VALUES ({$values})";
        
        return $this->sql;
    }
}