<?php

use controllers\toDoList;

include_once "../src/controllers/toDoList.php";
include_once "../src/services/ToDoService.php";
include_once "../src/utils/Database.php";
include_once "../src/utils/Utilities.php";
include_once "../src/entities/Task.php";

$controller = new toDoList();

$url = rtrim($_SERVER['REQUEST_URI']);

if($url === '/'){
    echo $controller->index();
    exit();
} elseif ($url === '/concluido') {
    echo $controller->finishedTasks();
    exit();
} else {
    header('Location: /');
}