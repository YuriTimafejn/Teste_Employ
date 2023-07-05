<?php

use controllers\toDoList;

require_once "../src/controllers/toDoList.php";
require_once "../src/services/ToDoService.php";
require_once "../src/utils/Database.php";
require_once "../src/utils/Utilities.php";
require_once "../src/utils/TaskFactory.php";
require_once "../src/entities/Task.php";

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