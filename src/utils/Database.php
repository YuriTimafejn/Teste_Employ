<?php

namespace utils;

use PDO;

class Database extends \PDO
{
    private string $host;
    private string $bancoDeDados;
    private string $usuario;
    private string $senha;

    public function __construct()
    {
        $this->host = (!empty($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : "127.0.0.1";
        $this->bancoDeDados = (!empty($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : "afazeres";
        $this->usuario = (!empty($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : "root";
        $this->senha = (!empty($_ENV['DB_PWD'])) ? $_ENV['DB_PWD'] : "toor";

        $dns = "mysql:host={$this->host};port=3306;dbname={$this->bancoDeDados};charset=utf8mb4";

        parent::__construct($dns, $this->usuario, $this->senha);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}