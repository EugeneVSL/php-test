<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($configuration)
    {
        // load environment variables
        $env = parse_ini_file(base_path('.env'));
        
        $usr = $env['DB_USERNAME'];
        $pwd = $env['DB_PASSWORD'];

        $dsn = "mysql:" . http_build_query($configuration, '', ';');

        // connect to db
        $this->connection = new PDO($dsn, $usr, $pwd, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = null)
    {

        $this->statement = $this->connection->prepare($query);

        if($params && count($params) > 0) {

            foreach ($params as $key => $value) {

                $this->statement->bindValue($key, $value);
            }
        }

        $this->statement->execute();

        // output the query and the query with values inserted
        return $this;
    }

    public function find() 
    {
        return $this->statement->fetch();
    }

    public function findOrFail() 
    {

        $result = $this->find();

        if(! $result) {

            abort();

        } else {

            return $result;
        }
    }
    
    public function get() 
    {
        return $this->statement->fetchAll();
    }
}