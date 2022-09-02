<?php
namespace lexico;

class AnalisadorLexico
{

    public array $TRASICOES;
    public array $FINAIS;
    public array $TOKENS = [];


    public function indentificarToken($entrada, $q)
    {
        $entrada = str_split($entrada);
        $qAtual = $q;
        $position = 0;

        foreach ($entrada as $e) {
            $position++;
            if (!$this->TRASICOES[$q][$e]) {
                echo "Entrada Inválida! => " . $e;
                break;
            }
            $qAtual = $this->TRASICOES[$qAtual][$e];
            if (array_key_exists($qAtual, $this->FINAIS)){
                if ($this->validateToken($entrada, $position))
                    array_push($this->TOKENS, $this->FINAIS[$qAtual]);
            }
        }
    }

    public function validateToken($entrada, $position){
        if ($entrada[$position + 1] == ' ') 
            return true;
        return false;
    }

    public function showTokens(){
        foreach ($this->TOKENS as $token){
            echo 'TOKEN => ' . $token . '<br>';
        }
    }
}
