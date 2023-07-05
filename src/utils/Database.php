<?php

namespace utils;

use PDO;

class Database extends \PDO
{
    private string $dbHost;
    private string $dbName;
    private string $dbUser;
    private string $dbPassword;

    public function __construct()
    {
        $this->dbHost = (!empty($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : "127.0.0.1";
        $this->dbName = (!empty($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : "afazeres";
        $this->dbUser = (!empty($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : "root";
        $this->dbPassword = (!empty($_ENV['DB_PWD'])) ? $_ENV['DB_PWD'] : "toor";

        $dns = "mysql:host=$this->dbHost;port=3306;dbname=$this->dbName;charset=utf8mb4";

        parent::__construct($dns, $this->dbUser, $this->dbPassword);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConectionString()
    {
        return trim("
                            mysql:host=$this->dbHost;
                            port=3306;dbname=$this->dbName;
                            charset=utf8mb4;
                            user=$this->dbUser;
                            password=$this->dbPassword                          
        ");
    }
}