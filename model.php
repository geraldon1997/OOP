<?php

class Model extends Core{

    protected function create($table,$cols){
        $query = "CREATE TABLE IF NOT EXISTS $table ($cols)";
        parent::execute($query);
    }

    protected function alter($table,$cols,$col){
        $query = "ALTER TABLE $table ADD $cols AFTER $col";
        parent::execute($query);
    }

    protected function drop($table){
        $query = "DROP TABLE $table";
        parent::execute($query);
    }

    protected function truncate($table){
        $query = "TRUNCATE TABLE $table";
        parent::execute($query);
    }

    protected function insert($table,$cols,$vals){
        $query = "INSERT INTO $table ($cols) VALUES ($vals)";
        parent::execute($query);
    }

    protected function update($table,$cols,$vals,$col,$val){
        $query = "UPDATE $table SET $cols = $vals WHERE $col = $val";
        parent::execute($query);
    }

    protected function delete($table,$col,$val){
        $query = "DELETE FROM $table WHERE $col = $val";
        parent::execute($query);
    }

    protected function view($table){
        $query = "SELECT * FROM $table";
        $result = parent::fetch($query);
    }

    protected function getData($table,$col,$val){
        $query = "SELECT * FROM $table WHERE $col = $val";
        parent::fetch($query);
    }

    protected function activate($table,$cols,$vals,$col,$val){
        $query = "UPDATE $table SET $cols = $vals WHERE $col = $val";
        parent::execute($query);
    }

    protected function deactivate($table,$cols,$vals,$col,$val){
        $query = "UPDATE $table SET $cols = $vals WHERE $col = $val";
        parent::execute($query);
    }
}