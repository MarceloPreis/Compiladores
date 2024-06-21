<?php
require_once 'AnalisadorSintatico.php';
require_once 'AnalizadorLexico.php';

use AnalisadorSintatico\AnalisadorSintatico;

$lexico = new AnalizadorLexico('./at05(1).jff');

$sintetico = new AnalisadorSintatico('./at05(1).jff');
$script = file_get_contents('./teste.jm');
$sintetico->lexico->indentifyrToken($script);
var_dump($sintetico->lexico->tokens);

if ($sintetico->P())
    echo "Válido";
else
    echo "Inválido";