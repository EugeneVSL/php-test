<?php

return [
    
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'php-test',
        'charset' => 'utf8mb4'
    ],
    
    'env_variables' => [
        'db_usr' => parse_ini_file('.env')['DB_USERNAME'],
        'db_pwd' => parse_ini_file('.env')['DB_PASSWORD'],
    ]
];
