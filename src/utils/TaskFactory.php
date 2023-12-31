<?php

namespace utils;

use entities\Task;

class TaskFactory
{
    public static function returnTask($dbReturn): Task
    {
        return new Task(
            $dbReturn['DATA_REGISTRO'],
            $dbReturn['DESCRICAO'],
            $dbReturn['LOCAL'],
            $dbReturn['OBSERVACAO'],
            $dbReturn['ID'],
            $dbReturn['FLAG_CONCLUIDO'],
            $dbReturn['DATA_CONCLUSAO']
        );
    }

    public static function returnCollection($dbReturns): array
    {
        $collection = [];

        foreach ($dbReturns as $task)
        {
            $task = self::returnTask($task);
            $collection[] = $task;
        }

        return $collection;
    }
}