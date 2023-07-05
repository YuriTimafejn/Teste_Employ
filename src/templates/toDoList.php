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
                foreach ($tasks as $task) { ?>

            <tr class="tb-linha">
                <td class="tb-coluna">
                    <input type="checkbox" name="" id="<?= $task->getId(); ?>" value="false"></td>
                <td class="tb-coluna"><?= $task->getDescription(); ?></td>
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

<script src="assets/js/main.js" type="module"></script>

<?php

include_once "botton.php";
