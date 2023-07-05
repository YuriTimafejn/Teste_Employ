<?php

namespace services;

use entities\Task;
use Exception;
use PDO;
use utils\Database;
use utils\TaskFactory;

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

    public function findAllNotDoneYet(): ?array
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.FLAG_CONCLUIDO = 0");

        $stage = $this->database->query($sql);
        $results = $stage->fetchAll(PDO::FETCH_ASSOC);

        if (!$results)
        {
            return null;
        }

        return TaskFactory::returnCollection($results);
    }

    public function findAllDone(): ?array
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.FLAG_CONCLUIDO = 1");

        $stage = $this->database->query($sql);
        $results = $stage->fetchAll(PDO::FETCH_ASSOC);

        if (!$results)
        {
            return null;
        }

        return TaskFactory::returnCollection($results);
    }

    public function findTask($id): ?Task
    {
        $sql = trim("SELECT t.* FROM TAREFAS t WHERE t.ID = :id");

        $stage = $this->database->prepare($sql);
        $stage->execute(['id' => $id]);
        $result = $stage->fetch(PDO::FETCH_ASSOC);

        if (!$result)
            return null;

        return TaskFactory::returnTask($result);
    }

    public function createTask($description, $locale, $notes): false|int
    {
        $sql = trim("INSERT INTO TAREFAS 
                                (DATA_REGISTRO, DATA_CONCLUSAO, DESCRICAO, LOCAL, OBSERVACAO, FLAG_CONCLUIDO)
                            VALUES (CURRENT_DATE,NULL,:description,:locale,:notes,0)");

        $stage = $this->database->prepare($sql);
        $stage->bindParam('description', $description, PDO::PARAM_STR);
        $stage->bindParam('locale', $locale, PDO::PARAM_STR);
        $stage->bindParam('notes', $notes, PDO::PARAM_STR);

        if($stage->execute())
        {
            return $this->database->lastInsertId();
        }

        return -1;
    }

    public function finishTask($id): bool
    {
        $sql = trim("UPDATE TAREFAS 
                SET 
                    FLAG_CONCLUIDO = 1,
                    DATA_CONCLUSAO = CURRENT_DATE
                WHERE ID = :id");

        $stage = $this->database->prepare($sql);
        $stage->bindParam('id', $id);

        return $stage->execute();
    }

    public function editTask($id): bool
    {
        $sql = trim("UPDATE TAREFAS
                            SET
                                DESCRICAO = ?,
                                LOCAL = ?,
                                DESCRICAO = ?
                            WHERE ID = ?");

        $stage = $this->database->prepare($sql);
        $stage->bindParam('id', $id);

        return $stage->execute();
    }

    public function deleteTask($id): bool
    {
        $sql = trim("DELETE FROM TAREFAS WHERE ID = :id");

        $stage = $this->database->prepare($sql);
        $stage->bindParam('id', $id);

        return $stage->execute();
    }

    public function saveTask(Task $task)
    {
        $sql = trim("
                           UPDATE TAREFAS
                           SET
                               DATA_REGISTRO = {$task->getDataStart()},
                               DATA_CONCLUSAO = {$task->getDateFinished()},
                               DESCRICAO = {$task->getDescription()},
                               LOCAL = {$task->getLocale()},
                               OBSERVACAO = {$task->getNotes()},
                               FLAG_CONCLUIDO = {$task->isFlagFinish()}
                           WHERE ID = {$task->getId()}
        ");

        $stage = $this->database->prepare($sql);

        return $stage->execute();
    }
}