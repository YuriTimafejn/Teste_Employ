<?php

namespace controllers;

use services\ToDoService;

class toDoList
{
    private ToDoService $service;

    public function __construct()
    {
        $this->service = new ToDoService();
    }

    public function index() {
        $tasks = $this->service->findAllNotDoneYet();
        ob_start();
        include_once __DIR__ . "/../templates/toDoList.php";

        return ob_get_clean();
    }

    public function tarefaConcluidas() {
        $task = $this->service->findAllDone();
        ob_start();
        include_once __DIR__ . "/../templates/concluido.php";

        return ob_get_clean();
    }
}