<?php

class Core extends Connection{
    
    protected function execute($query){
        $this->link->query($query);      
    }

    protected function fetch($query){
        $result = $this->link->query($query);
        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
}