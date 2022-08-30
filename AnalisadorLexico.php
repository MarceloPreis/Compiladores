<?php
namespace lexico;

class AnalisadorLexico
{

    public array $TRASICOES;
    public array $FINAIS;
    public array $TOKENS = [];


    public function tabelaDeTransicao(array $estados, array $estado_padrao, array $exception, array $adicionais)
    {
        $alfabet = array_merge(range('a', 'z'), range(0, 9), $adicionais);
        foreach ($estados as $estado) {
            foreach ($alfabet as $el) {
                $this->TRASICOES[$estado][$el] = isset($exception[$estado][$el]) ? $exception[$estado][$el] : $estado_padrao[$estado];
            }
        }
        return;
    }

    public function indentificarToken($entrada, $q)
    {
        $entrada = str_split($entrada);
        $qAtual = $q;

        foreach ($entrada as $e) {
            if (!$this->TRASICOES[$q][$e]) {
                echo "Entrada Inválida! => " . $e;
                break;
            }
            $qAtual = $this->TRASICOES[$qAtual][$e];
            if (array_key_exists($qAtual, $this->FINAIS))
                array_push($this->TOKENS, $this->FINAIS[$qAtual]);
        }
    }

    public function showTokens(){
        foreach ($this->TOKENS as $token){
            echo 'TOKEN => ' . $token . '<br>';
        }
    }
}
