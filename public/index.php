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
} elseif (preg_match('/^\/operacoes\/(\d+)\/(salvar|excluir|concluir)$/', $url, $matches)) {
    $id = $matches[1];
    $acao = $matches[2];

    switch ($acao) {
        case 'salvar':
            $data = json_decode(file_get_contents('php://input'), true);
            $operations->saveTask($data, $id);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Tarefa salva']);
            break;
        case 'excluir':
            $operations->deleteTask($id);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Tarefa removida']);
            break;
        case 'concluir':
            $operations->setFlagFinish($id);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Tarefa finalizada']);
            break;
    }
    header('Location: /');
    exit();
} else {
    header('Location: /');
    exit();
}