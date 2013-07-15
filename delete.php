<?php

function __autoload($classe)
{
    if(file_exists("app.ado/{$classe}.class.php")) {
	require_once "app.ado/{$classe}.class.php";
    }
}

// cria o criterio de seleção de dados
$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 3));

// cria a instrução delete
$sql = new TSqlDelete();
// define a entidade 
$sql->setEntity('aluno');
//define o criterio de seleção de dados
$sql->setCriteria($criteria);

// processa a instruçãos sql
echo $sql->getInstruction();
