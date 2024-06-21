<?php

namespace sistatico;

use token;

class AnalisadorSintatico
{
    public $TOKEN_LIST;
    public $RETURN = [];
    private $count = 0;

    public function validate()
    {   
        var_dump($this->TOKEN_LIST);
        // foreach ($this->TOKEN_LIST as $token){
        //     $this->E();
        // }
        // $this->E();
        // var_dump($this->RETURN);    

        if (in_array(false, $this->RETURN)) echo 'Inválido';
        else echo 'Válido';

        return;
    }

    public function add($token)
    {
        $arr = [
            'token' => $token->token,
            'position' => $token->position
        ];
        return array_push($this->TOKEN_LIST, $arr);
    }

    public function term($token)
    {
        $ret = $this->TOKEN_LIST[$this->count] == $token;
        $this->count++;
        array_push($this->RETURN, $ret);
        return $ret;
    }

    public function E()
    {
        $anterior = $this->count;
        if ($this->E1()) {
            return true;
        } else {
            $this->cont = $anterior;
            return $this->E2();
        };
    }

    public function E1()
    {
        return $this->T();
    }

    public function E2()
    {
        return (($this->T() && $this->term('MAIS')) && $this->E());
    }

    public function T()
    {
        $anterior = $this->count;
        if ($this->T1()) {
            return true;
        } else {
            $this->count = $anterior;
            if ($this->T2()) {
                return true;
            } else {
                $this->count = $anterior;
                return $this->T3();
            }
        }
    }

    public function T1()
    {
        return $this->term('INT');
    }

    public function T2()
    {
        return (($this->term('INT') && $this->term('MULT')) && $this->E());
    }

    public function T3()
    {
        return ($this->term('AP') && $this->E() && $this->term('FP'));
    }
}
