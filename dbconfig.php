<?php

class Connection{
    
    protected function __construct(){
        self::connect();
    }
    private function connect(){
        $this->link = new mysqli();
    }
}