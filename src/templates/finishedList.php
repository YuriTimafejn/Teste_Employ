<?php

use utils\utilities;

include_once 'header.php';

//Utilities::dd($tasks);
?>

<main>
    <?php if (!$tasks){ ?>

    <div>Nenhuma tarefa concluida até o momento :( </div>

    <?php
    } else {
    ?>

    <div class="listagem">
        <table class="tabela">
            <thead>
            <tr style="height: 1.7em; border-bottom: 1px solid var(--font-std)">
                <th class="data">Data Inclusão</th>
                <th>Tarefa</th>
                <th>Local</th>
                <th class="data">Data Conclusão</th>
            </tr>
            </thead>
            <tbody>

            <?php
                foreach ($tasks as $task) { ?>
                <tr style="height: 1.7em;" onclick="divFormFinalizado(<?= $task->getId(); ?>)">
                    <td class="data"><?= $task->getDataStart(); ?></td>
                    <td class="tb-center"><?= $task->getDescription();?></td>
                    <td class="tb-center"><?= $task->getLocale(); ?></td>
                    <td class="data"><?= $task->getDateFinished(); ?></td>
                </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
    </div>

    <?php
    }
    ?>

</main>

<?php
include_once 'botton.php';
