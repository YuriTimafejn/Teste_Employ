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
        include_once "../src/templates/toDoList.php";

        return ob_get_clean();
    }

    public function tarefaConcluidas() {
        // Buscar repositorio para listagem
        ob_start();
        include_once "../src/templates/concluido.php";

        return ob_get_clean();
    }
}