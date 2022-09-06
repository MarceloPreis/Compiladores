<?php

use State\State;
use Token\Token;

require_once('Token.php');
require_once('State.php');

class AnalizadorLexico
{
    private $array_from_xml;
    public $trasitions;
    public $alfabet;
    public $estados = [];
    public State $initial;
    public $finals = [];
    public $tokens = [];



    public function setAlfabet()
    {
        $this->alfabet = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    }

    function __construct($path)
    {
        $xml = file_get_contents($path);
        $new = simplexml_load_string($xml);
        $con = json_encode($new);
        $this->array_from_xml = json_decode($con, true);
        $this->setAlfabet();
        $this->setTrasitions();
        $this->setInitial();
        $this->setFinais();
    }

    public function indentifyrToken($entrada)
    {
        $entrada = $entrada . ' ';
        $entrada = str_split($entrada);
        $qAtual = $this->initial->id;
        $position = 0;

        foreach ($entrada as $e) {
            if ($e == ' ') {
                $position++;
                $qAtual = $this->initial->id;
                continue;
            }

            if (!isset($this->trasitions[$qAtual][$e])) {
                echo "Entrada Inválida! => Char:" . $e . ' Estado: ' . $qAtual;
                break;
            }

            $qAtual = $this->trasitions[$qAtual][$e];
            if (array_key_exists($qAtual, $this->finals)) {
                if ($this->validateToken($entrada, $position)) {
                    $token = new Token($this->finals[$qAtual], $position);
                    array_push($this->tokens, $token);
                    $qAtual = $this->initial->id;
                }
            }
            $position++;
        }
    }


    public function validateToken($entrada, $position)
    {
        if (count($entrada) >= $position + 1) {
            return $entrada[$position + 1] == ' ';
        }
        return false;
    }

    private function setTrasitions()
    {
        foreach ($this->array_from_xml['automaton']['transition'] as $transition) {
            if ($this->isRegex($transition['read']))
                $this->matrizForTransitionRegex($transition);
            else
                $this->trasitions[$transition['from']][$transition['read']] = $transition['to'];
        }
    }

    function isRegex($regex)
    {
        return (preg_match("/^\/[\s\S]+\/$/", $regex));
    }

    function testRegex($regex, $str)
    {
        if (!$this->isRegex($regex))
            return false;
        return preg_match($regex, $str);
    }

    function matrizForTransitionRegex($t)
    {

        foreach ($this->alfabet as $char) {
            if ($this->testRegex($t['read'], $char)) {
                $this->trasitions[$t['from']][$char] = $t['to'];
            }
        }
    }

    public function show()
    {
        echo 'Transições: <br>';
        foreach ($this->trasitions as $key => $state) {
            echo '<br>  [ ' . $key . ' ] => <br>';
            foreach ($state as $k => $s) {
                echo $k . ' => ' . $s . ', ';
            }
        };
    }

    public function setFinais()
    {
        $finais = [];
        foreach ($this->array_from_xml['automaton']['state'] as $state) {
            if (isset($state['final'])) {
                $finais[$state['@attributes']['id']] = $state['label'];
            }
        }

        $this->finals = $finais;
        return $finais;
    }

    public function setInitial()
    {
        $initial = null;
        foreach ($this->array_from_xml['automaton']['state'] as $state) {
            if (isset($state['initial'])) {
                $initial = new State($state['@attributes']);
                break;
            }
        }
        $this->initial = $initial;
    }
}
