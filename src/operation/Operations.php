<?php

namespace operation;

use services\ToDoService;
use utils\TaskFactory;

class Operations
{
    private ToDoService $service;

    public function __construct()
    {
        $this->service = new ToDoService();
    }

    public function objToJson($id): string
    {
        $result = $this->service->findTask($id)->toJson();
        if ($result)
            return $result;

        return '{}';
    }

    public function setFlagFinish($id): bool
    {
        return $this->service->finishTask($id);
    }

    public function deleteTask($id)
    {
        return $this->service->deleteTask($id);
    }

    public function saveTask($data, $id): bool
    {
        if ($id !== '0') {
            echo "Tarefa de id: {$id} editada";
            $task = $this->service->findTask($id);

            $task->setDescription($data['descricao']);
            $task->setLocale($data['local']);
            $task->setNotes($data['notas']);

            return $this->service->saveTask($task);
        }

        $id = $this->service->createTask($data['descricao'], $data['local'], $data['notas']);
        echo "Tarefa de id: {$id} criada";
        return true;
    }
}