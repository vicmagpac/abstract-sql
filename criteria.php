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

$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "<br />\n";

//aqui vemos um exemplo de critério utilizando os operadores '=' e IS NOT
//neste caso, o telefone não pode conter valor nulo(IS NOT NULL)
//e o sexo deve ser feminino (sexo=F)
$criteria = new TCriteria;
$criteria->add('telefone', 'IS NOT', NULL);
$criteria->add('sexo', '=', 'F');
echo $criteria->dump();
echo "<br />\n";



