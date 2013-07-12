<?php
/**
* classe TSqlUpdate
* Esta classe provê meios para manipulação de uma instrução de UPDATE no banco de dados
*/
final class TSqlUpdate extends TSqlInstruction
{
    private $columnValues;
   
    /**
     * MÉTODO setRowData()
     * atrabui valores à determinadas colunas no banco de dados que serão modificadas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
     */
    public function setRowData($column, $value)
    {
        //monta um array indexado pelo nome da coluna
        if(is_string($value)) {
            //adiciona \ em aspas
            $value = addslashes($value);
            
            //caso seja uma string
            $this->columnValues[$column] = "'$value'";
        }else if(is_bool($value)) {
            //caso seja um boolean
            $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
        }else if(isset($value)) {
            //caso seja outro valor
            $this->columnValues[$column] = $value;
        }else {
            //caso seja null
            $this->columnValues[$column] = "NULL";
        }
    }
    
    /**
     * retorna a instrução de UPDATE em forma de String
     */
    public function getInstruction()
    {
        //mostra a string de update
        $this->sql = "UPDATE {$this->entity}";
        //monta os pares: coluna=valor, ...
        if($this->columnValues) {
            foreach ($this->columnValues as $column => $value) {
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .= ' SET ' . implode(', ', $set);
        
        //retorna a clausula where do objeto $this->criteria
        if($this->criteria) {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }
        
        return $this->sql;
    }
    
}

?>
