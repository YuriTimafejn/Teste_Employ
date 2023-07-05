<?php

namespace services;

use Exception;
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
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function findAllNotDoneYet(): false|array
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.FLAG_CONCLUIDO = 0");

        $stage = $this->database->query($sql);
        return $stage->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAllDone(): false|array
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.FLAG_CONCLUIDO = 1");

        $stage = $this->database->query($sql);
        return $stage->fetchAll(PDO::FETCH_OBJ);
    }

    public function findTask($id)
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.ID = ?");

        $stage = $this->database->prepare($sql);
        return $stage->execute($id);
    }

    public function createTask()
    {
        $sql = trim("INSERT INTO TAREFAS 
                                (DATA_REGISTRO, DATA_CONCLUSAO, DESCRICAO, LOCAL, OBSERVACAO, FLAG_CONCLUIDO)
                            VALUES (CURRENT_DATE,NULL,?,?,?,0)");

        // return 'id'
    }

    public function finishTask($id)
    {
        $sql = trim("UPDATE TAREFAS 
                SET 
                    FLAG_CONCLUIDO = 1,
                    DATA_CONCLUSAO = CURRENT_DATE
                WHERE ID = ?");
    }

    public function editTask($id)
    {
        $sql = trim("UPDATE TAREFAS
                            SET
                                DESCRICAO = ?,
                                LOCAL = ?,
                                DESCRICAO = ?
                            WHERE ID = ?");
    }

    public function deleteTask($id)
    {
        $sql = trim("DELETE FROM TAREFAS WHERE ID = ?");
    }
}