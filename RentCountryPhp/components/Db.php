<?php

class Db {
    
    public function __constructor(){
            
    }
    public function getConnection() {
        $params = array(
            'host' => 'localhost',
            'dbname' => 'firstlanding',
            'user' => 'root',
            'password' => '',
        );

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        $db->exec('set names utf8');

        return $db;
    }

}
