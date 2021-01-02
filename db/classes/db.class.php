<?php

class Db{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'bara_natanael';

    protected function connect(){
        $dsn ='mysql:host='.$this->servername.';dbname='.$this->dbname;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

    }
}

?>