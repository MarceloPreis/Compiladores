<?php
require_once 'AnalisadorSintaticoPreditivo.php';
require_once 'AnalizadorLexico.php';

use SintaticoPreditivo\AnalisadorSintaticoPreditivo;
$path = './automatos/at05(1).jff';
$script = file_get_contents('./teste.jm');

$e = new AnalisadorSintaticoPreditivo($path, $script);

echo "Tokens Identidicados: ";
print_r($e->tokens);
echo 'Análise Sintatica';


if ($e->validadte())
    echo 'Válido!';
else
    echo 'Inválido!';
