<?php

function dd ($var): void {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}
//dd($_SERVER);

if($_SERVER['REQUEST_URI'] === '/'){
    include_once "../src/templates/toDoList.php";
    exit();
}