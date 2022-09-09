<?php

namespace Token;

class Token
{
    public $token;
    public $position;

    public function __construct($token, $position)
    {
        $this->token = $token;
        $this->position = $position;
    }

    public function toString()
    {
        return '[TOKEN] -> ' . $this->token . ' [POSIÇÃO] -> ' . $this->position;
    }
}   
