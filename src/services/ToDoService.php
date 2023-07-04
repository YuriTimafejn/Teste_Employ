<?php

namespace services;

use PDO;
use utils\Database;

include_once "../utils/Database.php";

class ToDoService
{
    private Database $database;

    public function __construct()
    {
        try {
            $this->database = new Database();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function findAllNotDoneYet()
    {
        $sql = "SELECT t.* FROM TAREFAS t WHERE t.FLAG_CONCLUIDO = 0";

        $stage = $this->database->query($sql);
        return $stage->fetchAll(PDO::FETCH_OBJ);
    }
}