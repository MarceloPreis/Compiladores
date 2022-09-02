<!DOCTYPE html>
<html lang="en">

<head>
    <title>At04. Analisador Descendente Recursivo para uma linguagem</title>
</head>

<?php

use lexico\AnalisadorLexico;
use sistatico\AnalisadorSintatico;

include_once("classes\AnalisadorLexico.php");
include_once("classes\AnalisadorSintatico.php");
include_once("classes\Token.php");
if (isset($_GET['entrada'])) {


    $adicionais = [' ', '*'];
    $estados = ['q0', 'q1', 'q2', 'q3', 'q4'];
    $padrao = [
        'q0' => 'q4',
        'q1' => 'q4',
        'q2' => 'q4',
        'q3' => 'q4',
        'q4' => 'q4'
    ];

    $exc = [
        'q0' => ['0' => 'q1', '1' => 'q1', '2' => 'q1', '3' => 'q1', '4' => 'q1', '5' => 'q1', '6' => 'q1', '7' => 'q1', '8' => 'q1', '9' => 'q1', '*' => 'q3'],
        'q1' => ['1' => 'q1', '2' => 'q1', '3' => 'q1', '4' => 'q1', '5' => 'q1', '6' => 'q1', '7' => 'q1', '8' => 'q1', '9' => 'q1', ' ' => 'q2'],
        'q2' => ['*' => 'q3'],
        'q3' => [' ' => 'q0'],
    ];


    $analisadorLexico = new AnalisadorLexico();
    $analisadorLexico->FINAIS = [
        'q2' => 'INT',
        'q0' => 'MULT',
    ];
    $analisadorLexico->tabelaDeTransicao($estados, $padrao, $exc, $adicionais);
    $analisadorLexico->indentificarToken($_GET['entrada'], 'q0');
    $analisadorLexico->showTokens();

    $analisadorSintatico = new AnalisadorSintatico();
    $analisadorSintatico->TOKEN_LIST = $analisadorLexico->TOKENS; 
    $analisadorSintatico->validate();
}
?>

<body>
    <form action="" method="get">
        <input type="text" name="entrada">
        <input type="submit">
    </form>
</body>

</html>