<?php

namespace AnalisadorSintatico;

require_once('AnalizadorLexico.php');

use AnalizadorLexico;

class AnalisadorSintatico
{

    private $contador;
    public $lexico;

    function __construct($path)
    {
        $this->contador = 0;
        $this->lexico =  new AnalizadorLexico($path);
    }

    public function term($token)
    {
        $ret = $this->lexico->tokens[$this->contador]->token == $token;
        $this->contador++;
        return $ret;
    }

    //<P> => fun ID {<LISTA_BLOCO>}
    public function P()
    {
        return $this->term("FUNCTION") && $this->term("ID") && $this->term("AB") && $this->lista_bloco() && $this->term("FB");
    }

    //<LISTA_BLOCO> => <BLOCO> <LISTA_BLOCO>
    public function lista_bloco()
    {
        $anterior = $this->contador;
        if ($this->lista_bloco1())
            return true;
        else {
            $this->contador = $anterior;
            return $this->lista_bloco2();
        }
    }

    //<LISTA_BLOCO> => <BLOCO>
    public function lista_bloco1()
    {
        return $this->bloco();
    }

    //<LISTA_BLOCO> => <BLOCO> <LISTA_BLOCO>
    public function lista_bloco2()
    {
        return $this->bloco() && $this->lista_bloco();
    }

    public function bloco()
    {
        $anterior = $this->contador;
        if ($this->bloco1()) {
            return true;
        } else if ($this->bloco2()){
            $this->contador = $anterior;
            return true;
        } else if ($this->bloco3()){
            $this->contador = $anterior;
            return true;
        } else {
            $this->contador = $anterior;
            return $this->bloco4();;
        }
    }

    public function bloco1()
    {
        return $this->atr();
    }

    public function bloco2()
    {
        return $this->IF();
    }

    public function bloco3()
    {
        return $this->PRINT();
    }

    public function bloco4()
    {
        return $this->WHILE();
    }

    public function atr()
    {
        return $this->term("ID") && $this->comparacao() && $this->var();
    }

    public function comparacao()
    {
        $anterior = $this->contador;
        if ($this->comparacao1())
            return true;
        else if ($this->comparacao2()){
            $this->contador = $anterior;
            return $this->comparacao2();
        } else {
            $this->contador = $anterior;
            return $this->comparacao3();
        }
    }    
    
    public function comparacao1()
    {
        return $this->term("COMPARACAO");
    }

    public function comparacao2()
    {
        return $this->term("MAIOR");
    }

    public function comparacao3()
    {
        return $this->term("MENOR");
    }

    public function var()
    {
        $anterior = $this->contador;
        if ($this->var1())
            return true;
        else {
            $this->contador = $anterior;
            return $this->var2();
        }
    }

    public function var1()
    {
        return $this->term("ID");
    }

    public function var2()
    {
        return $this->term("CONST");
    }

    public function IF()
    {
       return  $this->term("IF") && $this->term("AP") && $this->term("ID") && $this->comparacao() && $this->var() && $this->term("FP") && $this->term("AB") && $this->bloco() && $this->term("FB");
    }

    public function PRINT()
    {
       return  $this->term("PRINT") && $this->var();
    }

    public function WHILE()
    {
       return  $this->term("WHILE") && $this->term("AP") && $this->term("ID") && $this->comparacao() && $this->term("FP") && $this->var() && $this->term("AB") && $this->bloco() && $this->term("FB");
    }
}
