<?php
function __autoload($classe)
{
    if(file_exists("app.ado/{$classe}.class.php")) {
	require_once "app.ado/{$classe}.class.php";
    }
}

//cria criterio de seleção de dados
$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 3));

//cria instrução update
$sql = new TSqlUpdate();
//define a entidade 
$sql->setEntity('aluno');
//atribui o valor a cada coluna
$sql->setRowData('nome', 'Victor');
$sql->setRowData('rua', 'Rio Grande');

//define o criterio de seleção
$sql->setCriteria($criteria);

//processa a instrução sql
echo $sql->getInstruction();
?>
