<?php

namespace controllers;

class toDoList
{
    public function index() {
        // Buscar repositorio para listagem
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