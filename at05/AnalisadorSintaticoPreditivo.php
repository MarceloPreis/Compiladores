<?php

namespace SintaticoPreditivo;

require_once 'AnalizadorLexico.php';
use AnalizadorLexico;

class AnalisadorSintaticoPreditivo
{

    public array $m = [
        '-FUN-' => [
            'FUNCTION' => ['FUNCTION', 'AP', '-LISTA_VAR-', 'FP', 'AB', '-BLOCO-', 'FB']
        ],

        '-LISTA_VAR-' => [
            'ID' => ['-VAR-', '-LISTA_VAR-'],
            'CONST' => ['-VAR-', '-LISTA_VAR-',],
            'FP' => []
        ],

        '-VAR-' => [
            'ID' => ['ID'],
            'CONST' => ['CONST'],
        ],

        '-LISTA_BLOCO-' => [
            'ID' => ['-BLOCO-', '-LISTA_BLOCO-'],
            'PRINT' => ['-BLOCO-', '-LISTA_BLOCO-'],
            'IF' => ['-BLOCO-', '-LISTA_BLOCO-'],
            'WHILE' => ['-BLOCO-', '-LISTA_BLOCO-'],
            'FB' => []
        ],

        '-BLOCO-' => [
            'ID' => ['-ATR-'],
            'PRINT' => ['-PALAVRA_RESERVADA-'],
            'IF' => ['-PALAVRA_RESERVADA-'],
            'WHILE' => ['-PALAVRA_RESERVADA-'],
        ],

        '-PALAVRA_RESERVADA-' => [
            'IF' => ['IF', 'AP', '-COMP-', 'FP', 'AB', '-LISTA_BLOCO-', 'FB'],
            'WHILE' => ['WHILE', 'AP', '-COMP-', 'FP', 'AB', '-LISTA_BLOCO-', 'FB'],
            'PRINT' => ['PRINT', '-VAR-']

        ],

        '-ATR-' => [
            'ID' => ['ID', 'ATRIBUICAO', '-VAR-'],
        ],

        '-COMP-' => [
            'ID' => ['ID', '-SIMBOL-', '-VAR-'],
        ],

        '-SIMBOL-' => [
            'COMPARACAO' => ['COMPARACAO'],
            'MAIOR' => ['MAIOR'],
            'MENOR' => ['MENOR']
        ]
    ];
    // public $tokens = [
    //     'FUNCTION', 'AP', 'ID', 'ID', 'FP', 'AB', 'IF', 'AP', 'ID', 'COMPARACAO', 'CONST', 'FP', 'AB', 'PRINT', 'ID', 'FB', 'FB'
    // ];

    public array $tokens = [];


    public array $terminais = [
        'FUNCTION', 'AP', 'ID', 'FP', 'AB', 'ID', 'ATRIBUICAO', 'CONST', 'FB', 'PRINT', 'IF', 'WHILE', 'COMPARACAO', 'MENOR', 'MAIOR'
    ];

    public array $pilha = ['$'];

    private AnalizadorLexico $lexico;

    function __construct($path, $entrada)
    {
        $this->lexico = new AnalizadorLexico($path);
        $this->tokens = $this->lexico->indentifyrToken($entrada);
    }

    public function validadte()
    {
        print_r($this->tokens);
        $this->pilha[] = '-FUN-';
        $control = 0;
        $token = $this->tokens[0];
        do {
            // var_dump($this->pilha);
            echo '<br>TOPO = ' . end($this->pilha) . ' TOKEN = ' . $token->token . '<br>';
            if ($this->isTerminal(end($this->pilha))) {
                if (end($this->pilha) == $token->token) {
                    array_pop($this->pilha);
                    $control++;
                    $token = $this->nextToken($control);
                } else {
                    var_dump($this->pilha);
                    return false;
                }
            } else {
                $producao = $this->m[end($this->pilha)][$token->token];
                $this->empilhar($producao);
            }
        } while (end($this->pilha) != '$');
        return true;
    }

    public function isTerminal($e)
    {
        return in_array($e, $this->terminais);
    }

    public function empilhar($producao)
    {
        array_pop($this->pilha);
        $this->pilha = array_merge($this->pilha, array_reverse($producao));
    }

    public function nextToken($control)
    {
        if (count($this->tokens) <= $control)
            return;
        return $this->tokens[$control];
    }
}
