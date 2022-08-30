<?php
namespace token;

class Token {
    public $token;
    public $position;
    
    public function toString()
    {
        return '[TOKEN] -> ' . $this->token . ' [POSIÇÃO] -> ' . $this->position;
    }
}