<?php 
namespace State;
class State {
    public $id;
    public $name;

    function __construct($state)
    {
        $this->id = $state['id'];
        $this->name = $state['name'];
    }
}