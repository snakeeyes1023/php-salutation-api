<?php
/*
Src/Database.php

Gestion de la connexion à la base de données

source : https://dev.to/shahbaz17/build-a-simple-rest-api-in-php-2edl
*/

namespace Src;

class Database {

    private $dbConnection = null;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;dbname=$db",
                $username,
                $password
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}
