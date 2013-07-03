<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TCriteria.class.php';

//exemplo de criterio utilizando o operador lógico OR
//a idade deve ser menor que 16 OU Maior que 60
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "<br />\n";

//vemos um criterio utilizando o operador lógico AND juntamente com os operadores
//de conjunto IN (dentro do conjunto) e NOT IN (fora do conjunto)
//a idade deve estar dentro do conjunto (24, 25, 26) e deve está fora do conjunto (10)
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "<br />\n";


