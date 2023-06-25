<?php

class Database
{
    public $connection;

    public function __construct($configuration)
    {
        // load environment variables
        $env = parse_ini_file('.env');
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

        $statement = $this->connection->prepare($query);

        if($params && count($params) > 0) {

            foreach ($params as $key => $value) {

               $statement->bindValue($key, $value);
            }
        }

        $statement->execute();

        // output the query and the query with values inserted
        return $statement;
    }
}