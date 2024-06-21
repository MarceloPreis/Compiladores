<?php

namespace SintaticoPreditivo;

require_once 'AnalizadorLexico.php';
use AnalizadorLexico;

class AnalisadorSintaticoPreditivo
{

    public array $m = [
        '$' => [
            'FUNCTION' => ['-FUN-'],
            'ID' => ['-LISTA_VAR-'],
            'COST' => ['-LISTA_VAR-'],
            'PRINT' => ['-LISTA_BLOCO-'],
            'IF' => ['-LISTA_BLOCO-'],
            'WHILE' => ['-LISTA_BLOCO-'],
        ], 

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
            'FB' => [],
            'FP' => []
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
            'PRINT' => ['PRINT', 'AP', '-VAR-', 'FP']

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
        $control = 0;
        $token = $this->tokens[0];

        do {
            if ($this->isTerminal(end($this->pilha))) {

                if (end($this->pilha) == $token->token) {
                
                    array_pop($this->pilha);
                    
                    echo $token->token . " => ";
                    $control++;
                    $token = $this->nextToken($control);
                    echo $token->token . "\n";
                    

                } else {
                    return false;
                }
            } else {

                $producao = $this->m[end($this->pilha)][$token->token];
                $this->empilhar($producao);
                print_r($this->pilha);
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

        if (end($this->pilha) != '$') 
            array_pop($this->pilha);

        $this->pilha = array_merge($this->pilha, array_reverse($producao));

    }

    public function nextToken($control)
    {
        if (count($this->tokens) <= $control) {
            return end($this->tokens);
        }

        
        $token = $this->tokens[$control];

        if (!$token) {
        }

        return $token;
    }
}
