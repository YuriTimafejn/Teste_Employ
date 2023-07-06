<?php

use controllers\ToDoList;
use operation\Operations;

require_once "../src/controllers/ToDoList.php";
require_once "../src/operation/Operations.php";
require_once "../src/services/ToDoService.php";
require_once "../src/utils/Database.php";
require_once "../src/utils/Utilities.php";
require_once "../src/utils/TaskFactory.php";
require_once "../src/entities/Task.php";

$controller = new ToDoList();
$operations = new Operations();

$url = rtrim($_SERVER['REQUEST_URI']);

if($url === '/'){
    echo $controller->index();
    exit();
} elseif ($url === '/concluido') {
    echo $controller->finishedTasks();
    exit();
} elseif (preg_match('/^\/operacoes\/(\d+)$/', $url, $matches)) {
    $id = $matches[1];
    $json = $operations->objToJson($id);
    header('Content-Type: application/json');
    echo $json;
    exit();
} else {
    header('Location: /');
    exit();
}