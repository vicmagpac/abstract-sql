<?php

function __autoload($classe)
{
    if(file_exists("app.ado/{$classe}.class.php")) {
	require_once "app.ado/{$classe}.class.php";
    }
}

// define o locale do sistema, para permitir ponto decimal
// PS: no Windows, usar "english"
setlocale(LC_NUMERIC, 'POSIX');

//cria uma instrução de insert
$sql = new TSqlInsert;
//define o nome da entidade
$sql->setEntity("aluno");
//atribui o valor de cada coluna
$sql->setRowData('id', 3);
$sql->setRowData('nome', 'Victor');
$sql->setRowData('fone', '87233949');
$sql->setRowData('nascimento', '1992-09-23');
$sql->setRowData('sexo', 'M');

//processa a instrução sql
echo $sql->getInstruction();
