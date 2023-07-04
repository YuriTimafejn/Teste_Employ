<?php

use controllers\toDoList;

include_once "../src/controllers/toDoList.php";

function dd ($var): void {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}
//dd($_SERVER);

$controller = new toDoList();

if($_SERVER['REQUEST_URI'] === '/'){
    echo $controller->index();
    exit();
} elseif ($_SERVER['REQUEST_URI'] === '/concluido') {
    echo $controller->tarefaConcluidas();
    exit();
} else {
    echo $controller->index();
    exit();
}