<?php

namespace operation;

use services\ToDoService;

class Operations
{
    private ToDoService $service;

    public function __construct()
    {
        $this->service = new ToDoService();
    }

    public function objToJson($id): string
    {
        $result = $this->service->findTask($id)->toJson();
        if ($result)
            return $result;

        return '{}';
    }
}