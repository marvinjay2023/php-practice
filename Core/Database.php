<?php 

namespace Core;

use PDO,PDOException;


class Database{

    public $connection;
    public $statement;

    public function __construct($config, $user, $password){

        try{
            $dsn = 'mysql:'.http_build_query($config, '', ';');
            $this->connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        }
        catch(PDOException $error){
            echo 'Connection failed '. $error->getMessage();
        }

    }

    public function query($query, $param = []){

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($param);

        return $this;

    }

    public function fetchAll(){

        return $this->statement->fetchAll();

    }

    public function fetch(){

        return $this->statement->fetch();

    }

    public function findOrFail(){

        $result = $this->fetch();

        if(!$result){
            abort();
        }

        return $result;

    }

}