<?php

use utils\utilities;

include_once 'header.php';

//Utilities::dd($tasks);
?>

<main>
    <div class="listagem">
        <table class="tabela">
            <thead>
            <tr style="height: 1.7em;">
                <th class="data">Data Inclusão</th>
                <th>Tarefa</th>
                <th>Local</th>
                <th class="data">Data Conclusão</th>
            </tr>
            </thead>
            <tbody>
            <tr style="height: 1.7em;">
                <td class="data">20/03/2022</td>
                <td class="tb-center">Tarefa XYZ</td>
                <td class="tb-center">Praça da Sé</td>
                <td class="data">21/03/2022</td>
            </tr>
            <tr style="height: 1.7em;">
                <td class="data">27/03/2022</td>
                <td class="tb-center">Tarefa ABC</td>
                <td class="tb-center"></td>
                <td class="data">27/03/2022</td>
            </tr>
            <tr style="height: 1.7em;">
                <td class="data">05/09/2022</td>
                <td class="tb-center">Tarefa 123</td>
                <td class="tb-center">Casa de fulana</td>
                <td class="data">15/10/2022</td>
            </tr>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once 'botton.php';
