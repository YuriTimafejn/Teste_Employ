<?php

use utils\utilities;

include_once "header.php";

Utilities::dd($tasks);
?>

<main>
    <div class="tarefas">
        <div class="dataAtual">Data: 01/01/2000</div>
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

<script src="assets/js/main.js" type="module"></script>

<?php

include_once "botton.php";
