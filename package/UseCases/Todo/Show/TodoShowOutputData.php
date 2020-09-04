<?php

namespace Package\UseCases\Todo\Show;

use Package\UseCases\Todo\TodoObject;

class TodoShowOutputData
{
    public $todo;

    public function __construct(TodoObject $todo)
    {
        $this->todo = $todo;
    }
}
