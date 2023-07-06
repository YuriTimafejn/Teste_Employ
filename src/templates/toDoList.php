<?php

use utils\utilities;

include_once "header.php";

//Utilities::dd($tasks);
?>

<main>
    <div class="tarefas">
        <div class="dataAtual">Data: 01/01/2000</div>
    </div>
    <?php if(!$tasks) {
        ?>
    <div> Todas as tarefa concluidas :) </div>
    <?php
    } else {
    ?>
    <div class="listagem">
        <table class="tabela">

            <?php
                foreach ($tasks as $task) {
            ?>
            <tr onclick="divFormEdicao(<?= $task->getId(); ?>) ">
                <td><?= $task->getDescription(); ?></td>
            </tr>

            <?php
                }
            ?>

        </table>
    </div>
    <?php
    }
    ?>
</main>

<script src="assets/js/main.js" type="text/javascript"></script>
<?php

include_once "botton.php";
