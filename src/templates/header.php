<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">

    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/toDoList.css">
    <title>Meus afazeres</title>
</head>
<body>
<header>
    <div class="logo">Afazeres</div>
    <ul>
        <li><a href="/">Lista de afazeres</a></li>
        <li><a href="/concluido">Feito</a></li>
    </ul>
</header>
<div class="mensagens"></div>
<div class="div-novo">
    <button id="btn-novo" class="btn" onclick="divFormNovo()">
        &nbsp;Novo&nbsp;Afazer&nbsp;
    </button>
</div>

<?php
    include_once 'formTask.php';