<?php

use controllers\toDoList;

include_once "../src/controllers/toDoList.php";
include_once "../src/services/ToDoService.php";
include_once "../src/utils/Database.php";

function dd ($var): void {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}
//dd($_SERVER);

$controller = new toDoList();

$url = rtrim($_SERVER['REQUEST_URI']);

if($url === '/'){
    echo $controller->index();
    exit();
} elseif ($url === '/concluido') {
    echo $controller->tarefaConcluidas();
    exit();
} else {
    header('Location: /');
}