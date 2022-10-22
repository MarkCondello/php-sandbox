<?php

//https://en.wikibooks.org/wiki/PHP_Programming/PHP_Data_Objects
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $dbname = 'my_blog';
    private $dbh;
    private $error;
    private $stmt;

    public function __construct(){
        //https://phpdelusions.net/pdo_examples/connect_to_mysql
        $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbname;
        //set PDO options
        $options = array(
            //PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // checks what type is being passed as a query to the db
    //https://www.php.net/manual/en/pdostatement.bindvalue.php
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //https://www.php.net/manual/en/pdo.lastinsertid.php
    public function lastInsertId(){
        $this->dbh->lastInsertId();
    }
}
?>