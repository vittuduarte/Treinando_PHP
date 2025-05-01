// Sintaxe php
<?php
    echo"Hello, World!";
?>

//Comentarios
/**
Uso de blockdoc no PHP
*/

//Funcoes de saida


<?php
//Quebras de linhas
    echo "Hello" . "," . "World" . PHP_EOL;
?>


<?php
/**
 * Utilizado para verificar quais os tipos de dados e qual a linha que esses dados estao.
 * Tipos de dados, str, boolean, int, float, double, arrays 
 */

var_dump("true");
var_dump("[1,2,3,4]");
var_dump("12");
var_dump("12.29");
?>

<?php
//variaveis e constantes
$dados = ['NoNamed', 99, 'Azkaban'];
var_dump($dados[0]);

?>

/** Operadores aritmeticos */
<?php
$itemA = 10;
$itemB = 20;

$itemC = $itemA + $itemB; //Soma
$itemD = $itemA - $itemB; //Subtracao
$itemE = $itemA * $itemB; //Multiplicacao
$itemF = $itemA / $itemB; //Divisao
$itemG = $itemA % $itemB; //Resto da divisao

echo $itemC . PHP_EOL;
?>

/** Operadores de atribuicao */
<?php
$itemA = 10;
$itemB = 20;

$itemC += $itemA + $itemB; //Soma
$itemD -= $itemA - $itemB; //Subtracao
$itemE *= $itemA * $itemB; //Multiplicacao
$itemF /= $itemA / $itemB; //Divisao
$itemG %= $itemA % $itemB; //Resto da divisao

?>

//Operadores de Comparacao
<?php
var_dump( 1 == 1);
var_dump(1 != 1);
var_dump(1 >= 1);
var_dump(1<= 1);

?>