<?php

namespace Package\UseCases\Todo\Index;

use Package\UseCases\Todo\TodoObject;

class TodoIndexOutputData
{
    public $todos;

    /**
     * TodoGetListResponse constructor.
     * @param TodoObject[] $todos
     */
    public function __construct(array $todos)
    {
        $this->todos = $todos;
    }
}
