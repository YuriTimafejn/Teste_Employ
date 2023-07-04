<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/toDoList.css">
    <title>Meus afazeres</title>

    <script src="assets/js/eventos.js" type="module"></script>
</head>
<body>
<header>
    <div class="logo">Afazeres</div>
    <ul>
        <li><a href="#">Lista de afazeres</a></li>
        <li><a href="#">Feito</a></li>
    </ul>
</header>

<main>
    <div class="mensagens"></div>
    <div class="tarefas">
        <div class="dataAtual">Data: 01/01/2000</div>
        <div class="btn btn-novo" onclick="mostraTelaTarefa()">Adicionar Tarefa</div>
    </div>

    <div class="listagem">
        <table class="tabela">
            <tr class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id="" value="false"></td>
                <td class="tb-coluna">Tarefa 01</td>
            </tr>
            <tr class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id="" value="false"></td>
                <td class="tb-coluna">Tarefa 02</td>
            </tr>
            <tr class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id=""></td>
                <td class="tb-coluna">Tarefa 03</td>
            </tr>
            <tr class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id=""></td>
                <td class="tb-coluna">Tarefa 04</td>
            </tr>
            <tr  class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id=""></td>
                <td class="tb-coluna">Tarefa 05</td>
            </tr>
        </table>
    </div>
</main>

<div class="info-tarefa" id="form-tarefa">
    <input type="hidden" name="dataInsercao">
    <input type="hidden" name="dataConclusao">
    <div class="input-form"><input type="text" placeholder="Descrição"></div>
    <div class="input-form"><input type="text" placeholder="Local"></div>
    <div class="input-form"><textarea name="" id="" cols="30" rows="10" placeholder="NOTAS"></textarea></div>

    <div class="opcoes">
        <div><input type="button" value="Marcar como concluido"></div>
        <div><input type="button" value="Excluir"></div>
    </div>
</div>

<script src="assets/js/main.js" type="module"></script>

</body>
</html>